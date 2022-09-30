<?php

namespace App\Http\Livewire;

use App\Models\Guest;
use App\Models\MediaTranslation;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class AdminViewGuestPage extends Component
{
    //Listening for delete event.
    protected $listeners = ['delete'];

    public $guest;

    public function mount($guest_id){
        $this->guest = Guest::find($guest_id);
    }


    public function deleteConfirm($guest_id){
        //Notify User before delete i.e fire the event listener
        $this->confirmRequest('warning', 'Are you sure!', 'Press cancel to abort request', $guest_id);
    }

    public function delete($id){
        try {

            $guest = Guest::find($id);
            $guest->delete();

            //Notify Deleted
            $this->alert('success', 'Translation Deleted', 'Press Ok to continue');
            //Redirect to All guests page
            return redirect()->to(route('admin.guests'));
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

    public function render()
    {
        return view('livewire.admin.pages.admin-view-guest-page');
    }
}
