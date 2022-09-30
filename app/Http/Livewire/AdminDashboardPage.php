<?php

namespace App\Http\Livewire;

use App\Models\Guest;
use App\Models\Media;
use App\Models\MediaTranslation;
use App\Models\Member;
use App\Models\NonMember;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminDashboardPage extends Component
{
    public $churches;
    public $members;
    public $guests;
    public $missionaries;

    public function mount()
    {
        $this->fetchCounts();
    }

    public function fetchCounts()
    {
        $this->churches = User::count();
        $this->members = Member::count();
        $this->guests = Guest::count();
        $this->missionaries = NonMember::count();
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-dashboard-page');
    }
}
