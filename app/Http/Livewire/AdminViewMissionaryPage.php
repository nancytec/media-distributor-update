<?php

namespace App\Http\Livewire;

use App\Models\NonMember;
use App\Models\NonMemberFileLink;
use App\Models\NonMemberMediaLinkDownload;
use App\Models\NonMemberMediaLinkLike;
use App\Models\NonMemberMediaLinkShare;
use App\Models\NonMemberMediaLinkView;
use Livewire\Component;

class AdminViewMissionaryPage extends Component
{
    //Listening for delete event.
    protected $listeners = ['delete'];

    public $guest;

    public function mount($missionary_id){
        $this->guest = NonMember::find($missionary_id);
    }


    public function deleteConfirm($guest_id){
        //Notify User before delete i.e fire the event listener
        $this->confirmRequest('warning', 'Are you sure!', 'Press cancel to abort request', $guest_id);
    }

    public function delete($id){
        $guest = NonMember::find($id);
        $links = NonMemberFileLink::where('slug', $guest->slug)->get();
        foreach ($links as $link){
            try {
                NonMemberMediaLinkView::where('media_link', $link->link)->delete();
                NonMemberMediaLinkLike::where('media_link', $link->link)->delete();
                NonMemberMediaLinkShare::where('media_link',$link->link)->delete();
                NonMemberMediaLinkDownload::where('media_link', $link->link)->delete();
                NonMemberFileLink::where('link', $link->link)->delete();
                //Notify Deleted

            }catch (\Exception $err){
                $this->alert('error', 'Something went wrong', $err);
            }
        }

        $guest->delete();

        //Notify Deleted
        $this->alert('success', 'Missionary Deleted', 'Press Ok to continue');
        //Redirect to All guests page
        return redirect()->to(route('admin.missionaries'));

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
        return view('livewire.admin.pages.admin-view-missionary-page');
    }
}
