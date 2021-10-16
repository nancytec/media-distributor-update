<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class ChurchNewMemberPage extends Component
{
    public $name;
    public $email;
    public $password;
    public $c_password;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name'       => 'required|max:255',
            'email'      => 'required|email|max:255|unique:members,email',
            'password'   => 'required|min:6|max:255',
            'c_password' => 'min:6|required_with:password|same:password',
        ]);
    }

    public function save()
    {
        $this->validate([
            'name'       => 'required|max:255',
            'email'      => 'required|email|max:255|unique:members,email',
            'password'   => 'required|min:6|max:255',
            'c_password' => 'min:6|required_with:password|same:password',
        ]);

      Member::create([
            'church_id'        => Auth::user()->id,
            'email'            => $this->email,
            'slug'             => Str::slug($this->name),
            'password'         => bcrypt($this->password),
            'name'             => $this->name,
        ]);


      $this->clear(); //To clean user inputs
      return  $this->alert('success', 'Member Registered successfully');
    }

    public function alert($type, $title, $text="Press Ok to Continue"){
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => $type,
            'title' => $title,
            'text' => $text
        ]);
    }

    public function clear()
    {
        $this->name       = '';
        $this->email      = '';
        $this->password   = '';
        $this->c_password = '';
    }

    public function render()
    {
        return view('livewire.church.pages.church-new-member-page');
    }
}
