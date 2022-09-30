<?php

namespace App\Http\Livewire;

use App\Models\Media;
use App\Models\MediaTranslation;
use Illuminate\Support\Facades\Response;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class AdminMediaTranslationPage extends Component
{
    use WithFileUploads;

    public $media_id;
    public $translations;
    public $translationSearch;
    public $translationSection;
    public $media;

    //For properties
    public $language;
    public $media_file;

    protected $listeners = ['delete'];

    public function mount($media_id){
        $this->media = Media::find($media_id);
    }


    public function showTranslations(){
       $this->translations = MediaTranslation::where('media_id', $this->media_id)->get();

        $this->translationSection = true;
        return $this->emit('alert', ['type' => 'success', 'message' => 'Translations retrieved!']);
    }

    public function editTranslations($id){
        
        return MediaTranslation::find($id);
    }

    public function hideTranslations()
    {
        $this->translationSection = false;
        return $this->emit('alert', ['type' => 'success', 'message' => 'Translations hidden!']);
    }

    public function updated($field){
        $this->validateOnly($field, [
           'language' => 'required|max:255',
            'media_file' => 'required|file|mimes:pdf,doc,docx'
        ]);

        if ($this->translationSearch){
            $this->translations = MediaTranslation::where('media_id', $this->media_id)
                ->where('language', 'LIKE', "%{$this->translationSearch}%")
                ->get();
        }else{
            $this->translations = MediaTranslation::where('media_id', $this->media_id)->get();
        }
    }

    public function uploadTranslation(){
        $this->validate([
            'language' => 'required|max:255',
            'media_file' => 'required|file|mimes:pdf,doc,docx'
        ]);

        //Check if translation Exist
        if(MediaTranslation::where([
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
        MediaTranslation::create([
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
        $translation = MediaTranslation::find($translation_id);

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

    public function delete($id){
        try {

            $translation = MediaTranslation::find($id);
            File::delete(public_path("/uploads/$translation->path"));
            $translation->delete();

            //Notify Deleted
            $this->showTranslations();
            $this->alert('success', 'Translation Deleted', 'Press Ok to continue');
        }catch (\Exception $err){
            $this->alert('error', 'Something went wrong', $err);
        }

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

    public function render()
    {
        return view('livewire.admin.pages.admin-media-translation-page');
    }
}
