<?php

namespace App\Http\Livewire;

use App\Mail\MediaLinkMail;
use App\Models\MediaLinkDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class SendLink extends Component
{
    public $name;
    public $email;

    public function updated($field)
    {
        $this->validateOnly($field, [
           'name'  => 'required|string|max:255',
           'email'  => 'required|email'
        ]);
    }

    public function sendLink()
    {
        $this->validate([
            'name'  => 'required|string|max:255',
            'email'  => 'required|email'
        ]);

        $data = [
            'email' => $this->email,
            'name'  => $this->name,
            'file'  => 'Recreating_your_world.pdf',
            'media_name' => 'Recreating you world',
            'app_name' => 'Loveworld Books',
            'site_email' => 'info@loveworldbooks.org'
        ];
        Mail::to($this->email)->send(new MediaLinkMail($data));

        $link = MediaLinkDownload::where('media_link', url()->previous())->first();
        if ($link){
            $link->count += 1;
            $link->save();
        }

        $this->name = '';
        $this->email = '';
        $this->alert('success', 'Download link sent!', 'Please check your email inbox for the download link.');

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
        return view('livewire.member.components.send-link');
    }
}
