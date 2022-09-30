<?php

namespace App\Http\Livewire;

use App\Models\NonMember;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMissionaryPage extends Component
{
    use WithPagination;

    public $search;
    public $searchResult;

    public function updated($field){
        if ($this->search){
            $this->searchResult = NonMember::where('name', 'LIKE', "%{$this->search}%")->get();
        }
    }
    public function render()
    {
        if ($this->searchResult && !empty($this->search)){
            return view('livewire.admin.pages.admin-missionary-page', [
                'guests' => $this->searchResult
            ]);
        }else {
            $this->searchResult = false;
            return view('livewire.admin.pages.admin-missionary-page', [
                'guests' => NonMember::orderBy('id', 'DESC')->paginate(200)
            ]);
        }

    }
}
