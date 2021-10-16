<?php

namespace App\Http\Livewire;

use App\Models\ChurchMemberFileLink;
use App\Models\Media;
use App\Models\MediaLinkDownload;
use App\Models\MediaLinkLike;
use App\Models\MediaLinkShare;
use App\Models\MediaLinkView;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class MemberGenerateReferralLink extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;
    public $media;
    public $church;

    // Pre-fetched Data
    public $churches;
    public  $medias;

    //Toggle display props
    public $referal_link;
    public $showReferalLink;
    public $showGenerateLink;

    public $churchData;

    public function mount()
    {
        $this->fetchChurches();
        $this->fetchMedia();
        $this->showGenerateLinkForm();
    }


    public function showGenerateLinkForm(){
        $this->showGenerateLink = true;
        $this->showReferalLink = false;
    }

    public function displayLink($link){
        $this->referal_link = $link;
        $this->showGenerateLink = false;
        $this->showReferalLink = true;
    }

    public function updated($field)
    {
            $this->validateOnly($field, [
               'name'             => 'required|max:255',
               'email'            => 'required|email|max:255',
               'password'         => 'required|min:6|max:255',
               'confirm_password' => 'min:6|required_with:password|same:password',
               'church'           => 'required|max:255',
               'media'            => 'required|max:255',
            ]);

        $this->churchData = User::where('slug', $this->church)->first();
    }

    public function fetchChurches()
    {
        $churches = User::all();
        if ($churches){
            $this->churches = $churches;
        }
    }

    public function fetchMedia(){
        $medias = Media::all();
        if ($medias){
            $this->medias = $medias;
        }
    }

    public function generateLink()
    {
        $this->validate([
            'name'             => 'required|max:255',
            'email'            => 'required|email|max:255',
            'password'         => 'required|min:6|max:255',
            'confirm_password' => 'min:6|required_with:password|same:password',
            'church'           => 'required|max:255',
            'media'            => 'required|max:255',
        ]);

        // 1)Check if the user has an account
        $member = Member::where('email', $this->email)->first();
        if (!$member){
            //Create Member Account
            if (Member::where('name', $this->name)->where('church_id', $this->churchData->id)->first()){
                return $this->alert('error', 'The name has been taken');
            }
            $member  = $this->createNewMember();

            //Create a new media link
            $this->createMemberMediaLink($member);

            $referral_link = env('REF_URL').'/media/'.$this->media.'/'.$this->church.'/'.Str::slug($this->name);
            $this->clearInputs();

            $this->displayLink($referral_link);
            $this->alert('success', 'Link Created successfully');
            return true;

        }

        // 2) Check if the user is registered a referral link wit another church
        if (!$this->checkChurch()){
            //Else return authentication error
            $this->alert('warning', 'Invalid Church Selected', 'You have an account with another church, press Ok to try again');
            return false;
        }

        // 3)Check if the user already has a link with same church and same file, then retrieve the old link
            $referral_link = $this->verifyMember($member); // Returns the referral link or false
        if ($referral_link){
            $this->displayLink($referral_link);
            $this->alert('success', 'Link Retrieved successfully');
            return true;
        }else{
            //Else return authentication error
            $this->alert('error', 'Authentication Error', 'Press Ok to try again');
            return false;
        }

    }

    public function checkChurch(){
        $church = User::where('slug', $this->church)->first();
        $link = Member::where('email', '=', $this->email)->where('church_id', '=', $church->id)->get();
        if (count($link) > 0){
            return true;
        }
        return false;
    }

    public function verifyMember($member){
        // Compare password with Member registered password
        if(Hash::check($this->password, $member->password)) {
            // 3)Check if the user already has a link with same church and same file, then retrieve the old link
            $link = ChurchMemberFileLink::where('email', '=', $this->email)->where('media_id', '=', $this->media)->where('church_slug', '=', $this->church)->first();
            //If Media Exist
            if ($link){
                //Retrieve media Link
                return env('REF_URL').'/media/'.$link->media_id.'/'.$link->church_slug.'/'.Str::slug($link->name);
            }else{
                //Create a new media link
                $media = $this->createMemberMediaLink($member);
                return env('REF_URL').'/media/'.$this->media.'/'.$media->church_slug.'/'.$media->slug;
            }
        }
        return false;
    }

    public function createNewMember(){
        return Member::create([
            'name'             => $this->name,
            'church_id'        => $this->churchData->id,
            'email'            => $this->email,
            'slug'             => Str::slug($this->name),
            'password'         => bcrypt($this->password),
        ]);
    }

    public function createMemberMediaLink($member)
    {

      $mediaLink = ChurchMemberFileLink::create([
            'name'             => $member->name,
            'email'            => $member->email,
            'slug'             => Str::slug($this->name),
            'password'         => bcrypt($this->password),
            'link'             => env('REF_URL')."/media/$this->media"."/".$this->church."/".Str::slug($this->name),
            'church_slug'      => $this->church,
            'media_id'         => $this->media,
        ]);

      //Create Views with the inserted Data
      MediaLinkDownload::create([
            'media_link' => env('REF_URL')."/media/$this->media"."/".$this->church."/".Str::slug($this->name),
            'count'         => 0
      ]);
      MediaLinkShare::create([
            'media_link' => env('REF_URL')."/media/$this->media"."/".$this->church."/".Str::slug($this->name),
            'count'         => 0
      ]);

      return $mediaLink;
    }

    public function clearInputs(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->confirm_password = '';
        $this->church = '';
        $this->media = '';
    }


    public function alert($type, $title, $text="Press Ok to Continue"){
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => $type,
            'title' => $title,
            'text' => $text
        ]);
    }

    public function render()
    {
        return view('livewire.member.pages.member-generate-referral-link');
    }
}
