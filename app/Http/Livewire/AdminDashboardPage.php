<?php

namespace App\Http\Livewire;

use App\Models\Media;
use App\Models\MediaTranslation;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminDashboardPage extends Component
{
    use WithFileUploads;

    public $name;
    public $media;

    public function updated($field) {
        $this->validateOnly($field, [
           'name' => 'required|max:255',
           'media' => 'required|file|mimes:pdf,mp4,mp3|max:204800'
        ]);
    }

    public function uploadMedia()
    {
        $this->validate([
            'name' => 'required|max:255',
            'media' => 'required|file|mimes:pdf,mp4,mp3|max:204800'
        ]);

        $f_extension = $this->media->extension();
        //$this->storeFile($request->media_file, $file_name);
        $path = $this->media->store('', ['disk' => 'public_uploads']); // returns the filename

        $media = Media::create([
            'name' => $this->name,
            'path' => $path,
            'type' => $f_extension
        ]);

        // Insert the default English translation
        MediaTranslation::create([
            'media_id' => $media->id,
            'language' => 'English',
            'type'     => $f_extension,
            'path'     => $path
        ]);

        $this->name = '';
        $this->media = '';
        $this->alert('success', 'Media uploaded successfully', 'You will be redirected the translations page');

        //Redirect to translations page with the New media_id
        return redirect(route('admin.media-translation', $media->id));
    }


    public function alert($type, $title, $text="Press Ok to Continue"){
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => $type,
            'title' => $title,
            'text' => $text
        ]);
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-dashboard-page');
    }
}
