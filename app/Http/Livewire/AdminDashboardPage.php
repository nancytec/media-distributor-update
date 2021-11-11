<?php

namespace App\Http\Livewire;

use App\Models\Media;
use App\Models\MediaTranslation;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminDashboardPage extends Component
{

    public function render()
    {
        return view('livewire.admin.pages.admin-dashboard-page');
    }
}
