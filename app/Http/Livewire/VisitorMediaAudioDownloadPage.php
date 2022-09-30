<?php

namespace App\Http\Livewire;

use App\Models\Media;
use App\Models\MediaAudio;
use App\Models\MediaAudioTranslation;
use App\Models\MediaTranslation;
use Livewire\Component;

class VisitorMediaAudioDownloadPage extends Component
{
    public $media;
    public $mediaAudio;
    public $language;

    public $trans_preview;

    public function mount($media_id){
        $this->media = Media::find($media_id);
        $this->mediaAudio = MediaAudio::where('media_id', $media_id)->first();
        if (!$this->mediaAudio){
            $this->alert('error', "Media Not found", "press ok to continue");
        }
    }

    public function updated(){
        if ($this->language){
            $translation = MediaAudioTranslation::where([
                ['media_id', '=', $this->mediaAudio->id],
                ['language', '=', $this->language]
            ])->first();

            if ($translation == null){
                $this->trans_preview = false;
                return $this->emit('alert', ['type'=>'warning', 'message'=>'Translation not available']);
            }else{
                $this->trans_preview = $translation;
            }
        }
    }

    public function download(){
        $this->validate([
            'language' => 'required'
        ]);

        $translation = MediaAudioTranslation::where([
            ['media_id', '=', $this->mediaAudio->id],
            ['language', '=', $this->language]
        ])->first();


        if (!$translation){
            return $this->emit('alert', ['type' => 'error', 'message' => "Sorry, $this->language translation is currently not available"]);
        }

        //Send the media file to user
        //PDF file is stored under project/public/uploads
        $file= public_path("/uploads/".$translation->path);

        $headers = array(
            'Content-Type: application/pdf',
        );

        //Display a success alert message
        $this->alert('success', "$translation->language translation downloaded", "Thank you for taking interest in the book, please take time to share a copy of this book to help others, press ok to continue");

        //Close the preview modal
        $this->emit('close-audio-preview-modal');

        //Return the requested file to the user
        return \response()->download($file, "Now that you are born again_$translation->language.$translation->type", $headers);

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
        return view('livewire.member.pages.visitor-media-audio-download-page');
    }
}
