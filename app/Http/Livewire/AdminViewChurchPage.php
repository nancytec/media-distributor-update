<?php

namespace App\Http\Livewire;

use App\Models\ChurchFileLink;
use App\Models\ChurchMediaLinkDownload;
use App\Models\ChurchMediaLinkLike;
use App\Models\ChurchMediaLinkShare;
use App\Models\ChurchMediaLinkView;
use App\Models\ChurchMemberFileLink;
use App\Models\MediaLinkDownload;
use App\Models\MediaLinkLike;
use App\Models\MediaLinkShare;
use App\Models\MediaLinkView;
use App\Models\Member;
use App\Models\User;
use Livewire\Component;

class AdminViewChurchPage extends Component
{
    public $church;

    public $membersDisplay;
    public $sharedLinksDisplay;

    protected $listeners = ['delete' => 'delete', 'deleteMember' => 'deleteMember', 'deleteChurch' => 'deleteChurch'];


    public function showMembers(){
        $this->sharedLinksDisplay = false;
        $this->membersDisplay = true;
        $this->emit('alert', ['type' => 'success', 'message' => 'Members retrieved']);
    }

    public function showSharedLinks(){
        $this->membersDisplay = false;
        $this->sharedLinksDisplay = true;
        $this->emit('alert', ['type' => 'success', 'message' => 'Shared Links retrieved']);
    }

    public function mount($church_id){
        $this->church = User::findOrFail($church_id);
        $this->showSharedLinks();
    }

    public function fetchMember($church_email)
    {
        $this->church = User::where('email', $church_email)->first();
    }

    public function deleteConfirm($link_id){
        $link = ChurchFileLink::find($link_id);
        //Notify User before delete i.e fire the event listener
        $this->confirmRequest('warning', 'Are you sure!', 'Press cancel to abort request', $link->link);
    }

    public function delete($id){
        try {
            ChurchMediaLinkView::where('media_link', $id)->delete();
            ChurchMediaLinkLike::where('media_link', $id)->delete();
            ChurchMediaLinkShare::where('media_link', $id)->delete();
            ChurchMediaLinkDownload::where('media_link', $id)->delete();
            ChurchFileLink::where('link', $id)->delete();
            //Notify Deleted
            $this->fetchMember($this->church->email);
            $this->alert('success', 'Media Link Deleted', 'Press Ok to continue');
        }catch (\Exception $err){
            $this->alert('error', 'Something went wrong', $err);
        }
    }


    public function alert($type, $title, $text="Press Ok to Continue"){
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => $type,
            'title' => $title,
            'text' => $text,
        ]);
    }

    public function confirmRequest($type, $title, $text="Press Ok to Continue", $id=''){
        $this->dispatchBrowserEvent('swal:confirmMember', [
            'type' => $type,
            'title' => $title,
            'text' => $text,
            'id'   => $id
        ]);
    }

    public function confirmDeleteChurchRequest($type, $title, $text="Press Ok to Continue", $id=''){
        $this->dispatchBrowserEvent('swal:confirmChurchDelete', [
            'type' => $type,
            'title' => $title,
            'text' => $text,
            'id'   => $id
        ]);
    }


    public function deleteMemberConfirm($id){
        //Notify User before delete i.e fire the event listener
        $this->confirmRequest('warning', 'Are you sure!', 'Press cancel to abort request', $id);
    }

    public function deleteChurchConfirm($id){
        //Notify User before delete i.e fire the event listener
        $this->confirmDeleteChurchRequest('warning', 'Are you sure!', 'Press cancel to abort request', $id);
    }

    public function deleteMember($id){
        //Fetch User
        $member = Member::find($id);
        $media_links = ChurchMemberFileLink::where('slug', $member->slug)->get();

        foreach ($media_links as $media_link){
            try {
                MediaLinkView::where('media_link', $media_link->link)->delete();
                MediaLinkLike::where('media_link', $media_link->link)->delete();
                MediaLinkShare::where('media_link', $media_link->link)->delete();
                MediaLinkDownload::where('media_link', $media_link->link)->delete();
                ChurchMemberFileLink::where('link', $media_link->link)->delete();

            }catch (\Exception $err){
                $this->alert('error', 'Something went wrong', $err);
            }
        }
        //Delete the member
        $member->delete();
        //Notify Deleted
        $this->alert('success', 'Media Link Deleted', 'Press Ok to continue');

        $this->fetchMember($this->church->email);

    }

    public function deleteChurch($id){
        $members  = Member::where('church_id', $this->church->id)->get();
       foreach ($members as $member){
           //Delete all members media link of all members
           $media_links = ChurchMemberFileLink::where('slug', $member->slug)->get();
           foreach ($media_links as $media_link){
               try {
                   MediaLinkView::where('media_link', $media_link->link)->delete();
                   MediaLinkLike::where('media_link', $media_link->link)->delete();
                   MediaLinkShare::where('media_link', $media_link->link)->delete();
                   MediaLinkDownload::where('media_link', $media_link->link)->delete();
                   ChurchMemberFileLink::where('link', $media_link->link)->delete();

               }catch (\Exception $err){
                   $this->alert('error', 'Something went wrong', $err);
               }
           }
           //Delete the member
           $member->delete();
       }
        //Delete church media links and records
       $church = User::find($id);
       //Delete all members media link of all members
       $media_links = ChurchFileLink::where('church_id', $id)->get();
        foreach ($media_links as $media_link){
            try {
                ChurchMediaLinkView::where('media_link', $media_link->link)->delete();
                ChurchMediaLinkLike::where('media_link', $media_link->link)->delete();
                ChurchMediaLinkShare::where('media_link', $media_link->link)->delete();
                ChurchMediaLinkDownload::where('media_link', $media_link->link)->delete();
                ChurchFileLink::where('link', $media_link->link)->delete();

            }catch (\Exception $err){
                $this->alert('error', 'Something went wrong', $err);
            }
        }

        //Delete Church
        $church->delete();
        //Notify Deleted
        $this->alert('success', 'Church Record Deleted', 'You will be redirected shortly');
        //Redirect user back to all churches page
        return redirect(route('admin.churches'));

    }

    public function render()
    {
        return view('livewire.admin.pages.admin-view-church-page');
    }
}
