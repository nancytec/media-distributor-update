<?php

namespace App\Http\Livewire;

use App\Models\Media;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAllMediaPage extends Component
{
    use WithPagination;


    public function render()
    {
        return view('livewire.admin.pages.admin-all-media-page', [
            'medias' => Media::paginate(100)
        ]);
    }
}
