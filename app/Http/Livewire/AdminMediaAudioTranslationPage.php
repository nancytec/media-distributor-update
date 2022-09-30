<?php

namespace App\Http\Livewire;

use App\Models\MediaAudio;
use App\Models\MediaAudioTranslation;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminMediaAudioTranslationPage extends Component
{
    use WithFileUploads;

    public $media_id;
    public $translations;
    public $translationSection;
    public $media;
    public $parent;

    //For properties
    public $language;
    public $media_file;

    protected $listeners = ['delete' => 'delete', 'deleteAudio' => 'deleteAudio'];

    public function mount($media_id){
        $this->media = MediaAudio::find($media_id);
        $this->parent = $this->media->media;
    }

    public function showTranslations(){
        $this->translations = MediaAudioTranslation::where('media_id', $this->media_id)->get();
        $this->translationSection = true;
        return $this->emit('alert', ['type' => 'success', 'message' => 'Translations retrieved!']);
    }

    public function hideTranslations()
    {
        $this->translationSection = false;
        return $this->emit('alert', ['type' => 'success', 'message' => 'Translations hidden!']);
    }

    public function updated($field){
        $this->validateOnly($field, [
            'language' => 'required|max:255',
            'media_file' => 'required|file'
        ]);
    }

    public function uploadTranslation(){
        $this->validate([
            'language' => 'required|max:255',
            'media_file' => 'required|file'
        ]);

        //Check if translation Exist
        if(MediaAudioTranslation::where([
            ['media_id', '=', $this->media_id],
            ['language', '=', $this->language]
        ])->first()){
            $this->alert('info', 'Media translation exist', 'Press ok to verify from list');
            return $this->showTranslations();
        }

        $f_extension = $this->media_file->extension();
        //$this->storeFile($request->media_file, $file_name);
        $path = $this->media_file->store('', ['disk' => 'public_uploads']); // returns the filename

        // Insert the default English translation
        MediaAudioTranslation::create([
            'media_id' => $this->media_id,
            'language' => $this->language,
            'type'     => $f_extension,
            'path'     => $path
        ]);

        $this->language = '';
        $this->media_file = '';

        $this->showTranslations();
        $this->alert('success', 'Media translation uploaded successfully', 'You will be redirected the translations page');
    }

    public function downloadTranslation($translation_id)
    {
        $translation = MediaAudioTranslation::find($translation_id);

        //PDF file is stored under project/public/uploads
        $file= public_path("/uploads/".$translation->path);

        $headers = array(
            'Content-Type: application/pdf',
        );

        $this->alert('success', "$translation->language translation downloaded", 'press ok to continue');
        return \response()->download($file, "Now that you are born again_$translation->language.$translation->type", $headers);

    }

    public function deleteConfirm($translation_id){
        //Notify User before delete i.e fire the event listener
        $this->confirmRequest('warning', 'Are you sure!', 'Press cancel to abort request', $translation_id);
    }

    public function deleteAudioConfirm($audio_id){
        //Notify User before delete i.e fire the event listener
        $this->confirmAudioRequest('warning', 'Are you sure!', 'Press cancel to abort request', $audio_id);
    }

    public function delete($id){
        try {

            $translation = MediaAudioTranslation::find($id);
            File::delete(public_path("/uploads/$translation->path"));
            $translation->delete();

            //Notify Deleted
            $this->showTranslations();
            $this->alert('success', 'Translation Deleted', 'Press Ok to continue');
        }catch (\Exception $err){
            $this->alert('error', 'Something went wrong', $err);
        }

    }

    public function deleteAudio($id){
        $translations = MediaAudioTranslation::where('media_id', $id);
        foreach ($translations as $translation){
            try {
                File::delete(public_path("/uploads/$translation->path"));
                $translation->delete();

            }catch (\Exception $err){
                $this->alert('error', 'Something went wrong', $err);
            }
        }

        MediaAudio::find($id)->delete();
        $this->alert('success', 'Audio Version Deleted', 'You will be redirected shortly');
        return redirect(route('admin.media-view', $this->parent->id));
    }

    public function alert($type, $title, $text="Press Ok to Continue"){
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => $type,
            'title' => $title,
            'text' => $text
        ]);
    }

    public function confirmRequest($type, $title, $text="Press Ok to Continue", $id=''){
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => $type,
            'title' => $title,
            'text' => $text,
            'id'   => $id
        ]);
    }

    public function confirmAudioRequest($type, $title, $text="Press Ok to Continue", $id=''){
        $this->dispatchBrowserEvent('swal:confirmAudio', [
            'type' => $type,
            'title' => $title,
            'text' => $text,
            'id'   => $id
        ]);
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-media-audio-translation-page');
    }
}
