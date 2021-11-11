<?php

namespace App\Http\Livewire;

use App\Models\ChurchMemberFileLink;
use App\Models\MediaLinkDownload;
use App\Models\MediaLinkLike;
use App\Models\MediaLinkShare;
use App\Models\MediaLinkView;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ChurchMembersListPage extends Component
{
    use WithPagination;
    protected $listeners = ['delete'];


    public $search;
    public $searchResult;

    public function updated($field){
        if ($this->search){
            $this->searchResult = Member::where([
                ['church_id', '=', Auth::user()->id],
                ['name', 'LIKE', "%{$this->search}%"]
            ])->get();
        }
    }

    public function deleteConfirm($id){
        //Notify User before delete i.e fire the event listener
        $this->confirmRequest('warning', 'Are you sure!', 'Press cancel to abort request', $id);
    }

    public function delete($id){
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
        //Notify Deleted
        $this->alert('success', 'Media Link Deleted', 'Press Ok to continue');
        //Delete the member
        $member->delete();
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
        if ($this->searchResult && !empty($this->search)){
            return view('livewire.church.pages.church-members-list-page', [
                'members' => $this->searchResult
            ]);
        }else{
            $this->searchResult = false;
            return view('livewire.church.pages.church-members-list-page', [
                'members' => Member::where('church_id', Auth::user()->id)->paginate(200)
            ]);
        }

    }
}
