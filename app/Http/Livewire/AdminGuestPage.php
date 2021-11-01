<?php

namespace App\Http\Livewire;

use App\Models\Guest;
use Livewire\Component;
use Livewire\WithPagination;

class AdminGuestPage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.pages.admin-guest-page', [
            'guests' => Guest::orderBy('id', 'DESC')->paginate(100)
        ]);
    }
}
