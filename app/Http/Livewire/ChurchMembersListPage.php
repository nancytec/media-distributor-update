<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ChurchMembersListPage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.church.pages.church-members-list-page', [
            'members' => Member::where('church_id', Auth::user()->id)->paginate()
        ]);
    }
}
