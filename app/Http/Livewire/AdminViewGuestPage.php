<?php

namespace App\Http\Livewire;

use App\Models\Guest;
use Livewire\Component;

class AdminViewGuestPage extends Component
{
    public $guest;

    public function mount($guest_id){
        $this->guest = Guest::find($guest_id);
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-view-guest-page');
    }
}
