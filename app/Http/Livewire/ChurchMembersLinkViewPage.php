<?php

namespace App\Http\Livewire;

use App\Models\ChurchMemberFileLink;
use App\Models\MediaLinkDownload;
use App\Models\MediaLinkLike;
use App\Models\MediaLinkShare;
use App\Models\MediaLinkView;
use App\Models\Member;
use Livewire\Component;

class ChurchMembersLinkViewPage extends Component
{
    public $member;

    protected $listeners = ['delete'];

    public function mount($member_email)
    {
        $this->fetchMember($member_email);
    }

    public function fetchMember($member_email)
    {
        $this->member = Member::where('email', $member_email)->first();
    }

    public function deleteConfirm($link_id){
        $link = ChurchMemberFileLink::find($link_id);
        //Notify User before delete i.e fire the event listener
        $this->confirmRequest('warning', 'Are you sure!', 'Press cancel to abort request', $link->link);
    }

    public function delete($id){
        try {
            MediaLinkView::where('media_link', $id)->delete();
            MediaLinkLike::where('media_link', $id)->delete();
            MediaLinkShare::where('media_link', $id)->delete();
            MediaLinkDownload::where('media_link', $id)->delete();
            ChurchMemberFileLink::where('link', $id)->delete();
            //Notify Deleted
            $this->fetchMember($this->member->email);
            $this->alert('success', 'Media Link Deleted', 'Press Ok to continue');
        }catch (\Exception $err){
            $this->alert('error', 'Something went wrong', $err);
        }
//        ChurchMemberFileLink::find($id)->delete();
//        //Notify Deleted
//        $this->fetchMember($this->member->email);
//        $this->alert('success', 'Media Link Deleted', 'Press Ok to continue');
    }

    public function alert($type, $title, $text="Press Ok to Continue"){
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => $type,
            'title' => $title,
            'text' => $text,
        ]);
    }

    public function confirmRequest($type, $title, $text="Press Ok to Continue", $id=''){
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => $type,
            'title' => $title,
            'text' => $text,
            'id'   => $id
        ]);
    }

    public function render()
    {
        return view('livewire.church.pages.church-members-link-view-page');
    }
}
