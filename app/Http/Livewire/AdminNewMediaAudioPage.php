<?php

namespace App\Http\Livewire;

use App\Models\Media;
use App\Models\MediaAudio;
use App\Models\MediaAudioTranslation;
use Livewire\Component;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\False_;

class AdminNewMediaAudioPage extends Component
{
    use WithFileUploads;

    public $name;
    public $media;

    public $media_file;

    public function mount($media_id){
        $this->media_file = Media::find($media_id);
        $media = MediaAudio::where('media_id', $this->media_file->id)->first();
        if ($media){
            return redirect(route('admin.media-audio-translation', $media->id));
        }

    }

    public function updated($field) {
        $this->validateOnly($field, [
            'name' => 'required|max:255',
            'media' => 'required|file'
        ]);
    }

    public function uploadMedia()
    {
        $this->validate([
            'name' => 'required|max:255',
            'media' => 'required|file'
        ]);

        //Check if an Audio media exists for the Media
        if (MediaAudio::where('media_id', $this->media_file->id)->first()){
            $this->alert('error', 'Audio Version Exists', 'There is an audio version for this media.');
            return false;
        }

        $f_extension = $this->media->extension();
        //$this->storeFile($request->media_file, $file_name);
        $path = $this->media->store('', ['disk' => 'public_uploads']); // returns the filename

        $media = MediaAudio::create([
            'name' => $this->name,
            'media_id' => $this->media_file->id,
            'path' => $path,
        ]);

        // Insert the default English translation
        MediaAudioTranslation::create([
            'media_id' => $media->id,
            'language' => 'English',
            'type'     => $f_extension,
            'path'     => $path
        ]);

        $this->name = '';
        $this->media = '';
        $this->alert('success', 'Media uploaded successfully', 'You will be redirected the translations page');

        //Redirect to audio translations page with the New media_id
        return redirect(route('admin.media-audio-translation', $media->id));
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
        return view('livewire.admin.pages.admin-new-media-audio-page');
    }
}
