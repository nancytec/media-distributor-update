<?php

namespace App\Http\Livewire;

use App\Models\Media;
use App\Models\MediaAudio;
use App\Models\MediaTranslation;
use Livewire\Component;

class VisitorMediaDownloadPage extends Component
{
    public $media;
    public $version;

    public $docForm;
    public $audioForm;
    public $versionForm;

    protected $listeners =  ['showVersionForm'];

    public function showDocForm()
    {
        $this->audioForm = false;
        $this->docForm = true;
    }

    public function showAudioForm()
    {
        $this->docForm = false;
        $this->audioForm = true;
    }

    public function showVersionForm(){
        $this->docForm = false;
        $this->audioForm = false;
    }

    public function mount($media_id){
        $this->media = Media::find($media_id);
        if (!$this->media){
            $this->alert('error', "Media Not found", "press ok to continue");
        }
    }

    public function updated($field){
        $this->validateOnly($field, [
            'version' => 'required|max:255'
        ]);

        //Check for Audio Availability
        if ($this->version === 'Audio'){
            $audio = MediaAudio::where('media_id', $this->media->id)->first();
            if ($audio == null){
                // hide audio form
                return $this->emit('alert', ['type'=>'error', 'message'=>'Audio version available']);
            }else{
                // SHow Audio Form, Hide Pdf Form
                $this->showAudioForm();
            }
        }

        //Check if it's document that's selected
        if ($this->version === 'Document'){
            //Show Pdf Form, Hide Audio Form
            $this->showDocForm();
        }
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
        return view('livewire.member.pages.visitor-media-download-page');
    }
}
