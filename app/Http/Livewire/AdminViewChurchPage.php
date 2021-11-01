<?php

namespace App\Http\Livewire;

use App\Models\ChurchFileLink;
use App\Models\ChurchMediaLinkDownload;
use App\Models\ChurchMediaLinkLike;
use App\Models\ChurchMediaLinkShare;
use App\Models\ChurchMediaLinkView;
use App\Models\ChurchMemberFileLink;
use App\Models\User;
use Livewire\Component;

class AdminViewChurchPage extends Component
{
    public $church;

    public $membersDisplay;
    public $sharedLinksDisplay;

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
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => $type,
            'title' => $title,
            'text' => $text,
            'id'   => $id
        ]);
    }


    //Delete Member
    // Remove links, Remove the church data
    public function deleteConfirmMember($member_slug)
    {
        $links = ChurchMemberFileLink::where([
            ['slug', '=', $member_slug],
            ['church_slug', '=', $this->church->slug]
        ])->get();

        dd($links);

        foreach ($links as $link){

        }
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-view-church-page');
    }
}
