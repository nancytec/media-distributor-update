<?php

namespace App\Http\Livewire;

use App\Models\ChurchMemberFileLink;
use App\Models\MediaLinkDownload;
use App\Models\MediaLinkLike;
use App\Models\MediaLinkShare;
use App\Models\MediaLinkView;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MemberMediaLinksPage extends Component
{
    use WithPagination;

    protected $listeners = ['delete'];

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
            $this->alert('success', 'Media Link Deleted', 'Press Ok to continue');
        }catch (\Exception $err){
            $this->alert('error', 'Something went wrong', $err);
        }

    }

    public function confirmRequest($type, $title, $text="Press Ok to Continue", $id=''){
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => $type,
            'title' => $title,
            'text' => $text,
            'id'   => $id
        ]);
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
        return view('livewire.member.pages.member-media-links-page', [
            'links' => ChurchMemberFileLink::where('email', Auth::guard('member')->user()->email)->paginate(20)
        ]);
    }
}
