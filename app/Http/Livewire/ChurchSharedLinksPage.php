<?php

namespace App\Http\Livewire;

use App\Models\ChurchMemberFileLink;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ChurchSharedLinksPage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.church.pages.church-shared-links-page', [
            'links' => ChurchMemberFileLink::where('church_slug', Auth::user()->slug)->paginate(100)
        ]);
    }
}
