<?php

namespace App\Http\Livewire;

use App\Models\ChurchMemberFileLink;
use App\Models\Media;
use App\Models\MediaLinkDownload;
use App\Models\MediaLinkLike;
use App\Models\MediaLinkShare;
use App\Models\MediaLinkView;
use App\Models\Member;
use App\Models\NonMember;
use App\Models\NonMemberFileLink;
use App\Models\NonMemberMediaLinkDownload;
use App\Models\NonMemberMediaLinkShare;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class MemberGenerateReferralLink extends Component
{
    public $name;
    public $email;
    public $password;
    public $rawPassword;
    public $confirm_password;
    public $church_address;
    public $church_name;
    public $status;
    public $media = 1;
    public $church;
    public $unique_id;

    // Pre-fetched Data
    public $churches;
    public  $medias;

    //Toggle display props
    public $referal_link;
    public $showReferalLink;
    public $showGenerateLink;

    public $showMemberForm;
    public $showNonMemberForm;

    public $churchData;
    protected $listeners = ['displayMemberForm' => 'displayMemberForm'];

    public function mount()
    {
        $this->fetchChurches();
        $this->fetchMedia();
        $this->showGenerateLinkForm();
    }

    public function displayMemberForm()
    {
        $this->showNonMemberForm = false;
        $this->showMemberForm = true;
    }

    public function displayNonMemberForm()
    {
        $this->showMemberForm = false;
        $this->showNonMemberForm = true;
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
               'media'            => 'required|max:255',
            ]);

            if ($this->status === 'member'){
                $this->churchData = User::where('slug', $this->church)->first();

                $this->displayMemberForm();
            }

        if ($this->status === 'non_member'){
            $this->unique_id = Str::random(30).'_'.time();
            $this->displayNonMemberForm();
        }

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
        if ($this->status === 'member'){
            $this->generateMemberLink();
       }

        if ($this->status === 'non_member'){
            $this->generateNonMemberLink();
        }
    }

    public function generateMemberLink(){
        $this->validate([
            'name'             => 'required|max:255',
            'email'            => 'required|email|max:255',
            'password'         => 'required|min:6|max:255',
            'confirm_password' => 'min:6|required_with:password|same:password',
            'media'            => 'required|max:255',
            'church'            => 'required|max:255',
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


    public function generateNonMemberLink(){
        $this->validate([
            'name'             => 'required|max:255',
            'email'            => 'required|email|max:255',
            'password'         => 'required|min:6|max:255',
            'confirm_password' => 'min:6|required_with:password|same:password',
            'media'            => 'required|max:255',
            'church_address'   => 'required|max:1000',
        ]);

        $this->rawPassword = $this->password;
        $this->password = bcrypt($this->password);

        // 1)Check if the user has an account
        $nonMember = NonMember::where('email', $this->email)->first();
        if (!$nonMember){
            //Create Member Account
            $nonMember  = $this->createNewNonMember();

            //Create a new media link
            $this->createNonMemberMediaLink($nonMember);

            $referral_link = env('REF_URL')."/m/$this->media"."/".$nonMember->slug."/".$nonMember->unique_id;
            $this->clearInputs();

            $this->displayLink($referral_link);
            $this->alert('success', 'Link Created successfully');
            return true;

        }

        // 2)Check if the user already has a link with same church and same file, then retrieve the old link
        $referral_link = $this->verifyNonMember($nonMember); // Returns the referral link or false
        if ($referral_link){
            $this->displayLink($referral_link);
            $this->alert('success', 'Link Retrieved successfully');
            return true;
        }else{
            //Else return authentication error
            $this->password = $this->rawPassword;
            $this->alert('error', 'Authentication Error', 'Press Ok to try again');
            return false;
        }

    }


    public function verifyNonMember($member){
        // Compare password with Member registered password
        if(Hash::check($this->rawPassword, $member->password)) {

            // 3)Check if the user already has a link with same church and same file, then retrieve the old link
            $link = NonMemberFileLink::where('email', '=', $this->email)->where('media_id', '=', $this->media)->first();
            //If Media Exist
            if ($link){
                //Retrieve media Link
                return env('REF_URL')."/m/$this->media"."/".$link->slug."/".$link->unique_id;
            }else{
                //Create a new media link
                $media = $this->createNonMemberMediaLink($member);
                return env('REF_URL')."/m/$this->media"."/".$media->slug."/".$media->unique_id;
            }
        }
        return false;
    }

    public function createNewNonMember(){
        return NonMember::create([
            'name'             => $this->name,
            'email'            => $this->email,
            'slug'             => Str::slug($this->name),
            'unique_id'        => $this->unique_id,
            'password'         => $this->password,
            'church_name'      => $this->church_name,
            'church_address'   => $this->church_address,
        ]);
    }

    public function createNonMemberMediaLink($user)
    {
        $mediaLink = NonMemberFileLink::create([
            'name'             => $user->name,
            'email'            => $user->email,
            'slug'             => $user->slug,
            'unique_id'        => $user->unique_id,
            'password'         => $user->password,
            'church_name'      => $this->church_name,
            'church_address'   => $this->church_address,
            'link'             => "/m/$this->media"."/".$user->slug."/".$user->unique_id,
            'media_id'         => $this->media,
        ]);

        //Create Views with the inserted Data
        NonMemberMediaLinkDownload::create([
            'media_link' => "/m/$this->media"."/".$user->slug."/".$user->unique_id,
            'count'         => 0
        ]);
        NonMemberMediaLinkShare::create([
            'media_link' => "/m/$this->media"."/".$user->slug."/".$user->unique_id,
            'count'         => 0
        ]);

        return $mediaLink;
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
            'link'             => "/media/$this->media"."/".$this->church."/".Str::slug($this->name),
            'church_slug'      => $this->church,
            'media_id'         => $this->media,
        ]);

      //Create Views with the inserted Data
      MediaLinkDownload::create([
            'media_link' => "/media/$this->media"."/".$this->church."/".Str::slug($this->name),
            'count'         => 0
      ]);
      MediaLinkShare::create([
            'media_link' => "/media/$this->media"."/".$this->church."/".Str::slug($this->name),
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
