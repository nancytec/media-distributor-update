<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class MemberLoginPage extends Component
{
    public $email;
    public $password;

    public function updated($feild)
    {
        $this->validateOnly($feild, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
    }

    public function login ()
    {
        $this->validate([
            'email'  => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        if(Auth::guard('member')->attempt(['email' => $this->email, 'password' => $this->password]))
        {
            return redirect()->intended('/member/dashboard');
        }

        return $this->emit('alert', ['type' => 'error', 'message' => 'invalid credentials.']);

    }

    public function render()
    {
        return view('livewire.member.pages.member-login-page');
    }
}
