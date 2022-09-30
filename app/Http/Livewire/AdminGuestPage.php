<?php

namespace App\Http\Livewire;

use App\Models\Guest;
use Livewire\Component;
use Livewire\WithPagination;

class AdminGuestPage extends Component
{
    use WithPagination;

    public $search;
    public $searchResult;

    public function updated($field)
    {
        if ($this->search){
            $this->searchResult = Guest::where('name', 'LIKE', "%{$this->search}%")->get();
        }

    }

    public function render()
    {
        if ($this->searchResult && !empty($this->search)){
            return view('livewire.admin.pages.admin-guest-page', [
                'guests' => $this->searchResult
            ]);
        }else {
            $this->searchResult = false;
            return view('livewire.admin.pages.admin-guest-page', [
                'guests' => Guest::orderBy('id', 'DESC')->paginate(200)
            ]);
        }

    }
}
