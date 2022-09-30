<?php

namespace App\Http\Livewire;

use App\Models\ChurchFileLink;
use App\Models\ChurchMediaLinkDownload;
use App\Models\ChurchMediaLinkShare;
use App\Models\ChurchMemberFileLink;
use App\Models\Media;
use App\Models\MediaLinkDownload;
use App\Models\MediaLinkLike;
use App\Models\MediaLinkShare;
use App\Models\MediaLinkView;
use App\Models\MediaTranslation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class ChurchViewMediaPage extends Component
{
    public $media;
    public $churches;
    public $translations;

    public $distLinks;
    public $translationSection;

    protected $listeners = ['delete'];

    public function mount($media_id){
        $this->media = Media::find($media_id);
        $this->showTranslations();
    }

    public function showTranslations()
    {
        $this->hideDistLinks();
        $this->translations = MediaTranslation::where('media_id', $this->media->id)->get();
        $this->translationSection = true;
        return $this->emit('alert', ['type' => 'success', 'message' => 'Translations retrieved!']);
    }

    public function hideTranslations()
    {
        $this->translationSection = false;
        return $this->emit('alert', ['type' => 'success', 'message' => 'Translations hidden!']);
    }

    public function showDistLinks(){
        $this->fetchChurches();
        if (!ChurchFileLink::where('church_id', Auth::user()->id)->first()){
            $this->createRefLink(Auth::user());
        }

        $this->distLinks = true;
        return $this->emit('alert', ['type' => 'success', 'message' => 'Distributors Link Generated']);
    }

    public function createRefLink($user){
        $media_id = $this->media->id;
        ChurchFileLink::create([
            'name'             => $user->name,
            'email'            => $user->email,
            'slug'             => $user->slug,
            'church_id'        => $user->id,
            'link'             => "/church_media/$media_id"."/".$user->slug,
            'media_id'         => $this->media->id,
        ]);

        //Create Views with the inserted Data
        ChurchMediaLinkDownload::create([
            'media_link' => "/church_media/$media_id"."/".$user->slug,
            'count'         => 0
        ]);
        ChurchMediaLinkShare::create([
            'media_link' => "/church_media/$media_id"."/".$user->slug,
            'count'         => 0
        ]);
    }

    public function hideDistLinks(){
        $this->distLinks = false;
        return $this->emit('alert', ['type' => 'success', 'message' => 'Distributors Link Hidden.']);
    }

    public function fetchChurches()
    {
        $this->churches = User::where('id', Auth::user()->id)->get();
    }

    public function confirmDelete($translation_id){
        //Notify User before delete i.e fire the event listener
        $this->confirmRequest('warning', 'Are you sure!', 'Press cancel to abort request', $translation_id);
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

    public function delete($id){
        //1. Fetch shared links links
        $media_links = ChurchMemberFileLink::where('media_id', $id)->get();
        if ($media_links){
            foreach ($media_links as $link){
                //1. Remove all media_link statistic Records
                try {
                    MediaLinkView::where('media_link', $link->link)->delete();
                    MediaLinkLike::where('media_link', $link->link)->delete();
                    MediaLinkShare::where('media_link', $link->link)->delete();
                    MediaLinkDownload::where('media_link', $link->link)->delete();
                    ChurchMemberFileLink::where('link', $link->link)->delete();

                }catch (\Exception $err){
                    $this->alert('error', 'Something went wrong', $err);
                }
            }
        }

        //2. remove Shared Links
        try {
            $media_links->delete();
        }catch (\Exception $err){
            $this->alert('error', 'Something went wrong', $err);
        }

        //3. Delete All the translations
        try {
            $translations = MediaTranslation::where('media_id', $id)->get();
            if ($translations){
                foreach ($translations as $translation){
                    $translation = MediaTranslation::find($id);
                    File::delete(public_path("/uploads/$translation->path"));
                    $translation->delete();
                }
            }

            //4. Delete the media record
            try {
                Media::find($id)->delete();
            }catch (\Exception $err){
                $this->alert('error', 'Something went wrong', $err);
            }

            //Notify Deleted
            $this->alert('success', 'Media Deleted', 'Press Ok to continue');
            return redirect(route('admin.all-media'));
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
        return view('livewire.church.pages.church-view-media-page');
    }
}
