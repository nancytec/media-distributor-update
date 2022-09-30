<?php

namespace App\Http\Livewire;

use App\Models\Media;
use App\Models\NonMember;
use App\Models\NonMemberFileLink;
use App\Models\NonMemberMediaLinkDownload;
use App\Models\NonMemberMediaLinkShare;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class NonMemberGenerateReferralLink extends Component
{
    public $name;
    public $email;
    public $password;
    public $rawPassword;
    public $confirm_password;
    public $media = 1;
    public $unique_id;

    // Pre-fetched Data
    public  $medias;

    //Toggle display props
    public $referal_link;
    public $showReferalLink;
    public $showGenerateLink;

    public $churchData;

    public function mount()
    {
        $this->fetchMedia();
        $this->showGenerateLinkForm();

        $this->unique_id = Str::random(30).'_'.time();
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

//        $this->churchData = User::where('slug', $this->church)->first();
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
            'media'            => 'required|max:255',
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

            $referral_link = env('REF_URL')."/non_member_media/$this->media"."/".$nonMember->slug."/".$nonMember->unique_id;
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
                return env('REF_URL')."/non_member_media/$this->media"."/".$link->slug."/".$link->unique_id;
            }else{
                //Create a new media link
                $media = $this->createNonMemberMediaLink($member);
                return env('REF_URL')."/non_member_media/$this->media"."/".$media->slug."/".$media->unique_id;
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
            'link'             => "/non_member_media/$this->media"."/".$user->slug."/".$user->unique_id,
            'media_id'         => $this->media,
        ]);

        //Create Views with the inserted Data
        NonMemberMediaLinkDownload::create([
            'media_link' => "/non_member_media/$this->media"."/".$user->slug."/".$user->unique_id,
            'count'         => 0
        ]);
        NonMemberMediaLinkShare::create([
            'media_link' => "/non_member_media/$this->media"."/".$user->slug."/".$user->unique_id,
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
        return view('livewire.member.pages.non-member-generate-referral-link');
    }
}
