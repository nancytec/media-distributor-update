<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class AdminChurchPage extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $password;
    public $c_password;


    public function updated($field)
    {
        $this->validateOnly($field, [
            'name'       => 'required|max:255',
            'email'      => 'required|email|max:255|unique:users,email',
            'password'   => 'required|min:6|max:255',
            'c_password' => 'min:6|required_with:password|same:password',
        ]);
    }

    public function save()
    {
        $this->validate([
            'name'       => 'required|max:255',
            'email'      => 'required|email|max:255|unique:users,email',
            'password'   =>  'required|min:6|max:255',
            'c_password' => 'min:6|required_with:password|same:password',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'slug'  => Str::slug($this->name),
            'password' => bcrypt($this->password),
        ]);

        $this->emit('close-preview-modal');
        $this->clearInputs();
        $this->alert('success', 'New Church Registered');
        return;
    }

    public function clearInputs(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->c_password = '';
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
        return view('livewire.admin.pages.admin-church-page', [
            'churches' => User::orderBy('id', 'DESC')->paginate(2000)
        ]);
    }
}
