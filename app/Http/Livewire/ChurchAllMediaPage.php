<?php

namespace App\Http\Livewire;

use App\Models\Media;
use Livewire\Component;
use Livewire\WithPagination;

class ChurchAllMediaPage extends Component
{
    use WithPagination;


    public function render()
    {
        return view('livewire.church.pages.church-all-media-page', [
            'medias' => Media::paginate(100)
        ]);
    }
}
