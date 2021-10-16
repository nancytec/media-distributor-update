<?php

namespace App\Http\Livewire;

use App\Mail\AccountUpdateEmail;
use App\Mail\PasswordTokenEmail;
use App\Models\Member;
use App\Models\MemberPassReset as PassReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class MemberPasswordReset extends Component
{


    /*
    | Properties needed for user validation
    | And new password update
    */
    public $email;
    public $token;
    public $password;
    public $password_confirmation;

    public $setting;

    /*
    | Password reset forms display toggle
    */
    public $showResetForm = true;
    public $showTokenForm = false;
    public $showChoosePass = false;


    public function mount()
    {
    }
    /*
    | Displays password reset form
    |
    | Opens first before others
    */
    public function showResetForm()
    {
        $this->showResetForm  = true;
        $this->showTokenForm  = false;
        $this->showChoosePass = false;
    }

    /*
    | Displays token form
    */
    public function showTokenForm()
    {
        $this->showResetForm  = false;
        $this->showTokenForm  = true;
        $this->showChoosePass = false;
    }

    /*
    | Displays new password form
    */
    public function showChoosePass()
    {
        $this->showResetForm  = false;
        $this->showTokenForm  = false;
        $this->showChoosePass = true;
    }

    /*
    | Realtime form validation method
    */
    public function updated($field)
    {
        $this->validateOnly
        ($field,[
            'email' => 'required|email|max:255',
        ]);
    }

    /*
     | Updates existing user password reset token
     */
    public function updateToken()
    {
        //fetch user information
        $userData = Member::where('email', $this->email)->first();

        //Generate new reset token
        $code = Str::random(10);

        //Updates existing reset token
        PassReset::where('email', $this->email)->update([
            'token' => $code,
        ]);


        //Email Information
        $data = [
            'email' => $this->email,
            'token' => $code,
            'name'  => $userData->name,
            'app_name' => 'Loveworld Books',
            'site_email' => 'info@loveworldbooks.org'
        ];

        Mail::to($this->email)->send(new PasswordTokenEmail($data));

        //Success message
        session()->flash('message', 'Reset token sent.');
        $this->alert('success', 'Reset token sent to your email', 'Press Ok to continue');

        //Display token form
        $this->showTokenForm();

    }

    /*
    | Add new user password reset token
    */
    public function newToken()
    {

        //fetch user information
        $userData = Member::where('email', $this->email)->first();

        //Generate new reset token
        $code = Str::random(10);

        //Add new user password reset token to database
        PassReset::create([
            'email' => $this->email,
            'token' => $code, //generates random
        ]);
        $data = [
            'email' => $this->email,
            'token' => $code,
            'name'  => $userData->name,
            'app_name' => 'Loveworld Books',
            'site_email' => 'info@loveworldbooks.org'
        ];
        Mail::to($this->email)->send(new PasswordTokenEmail($data));

        //Success message
        session()->flash('message', 'Reset token sent.');

        $this->alert('success', 'Reset token sent to your email', 'Press Ok to continue');

        //Display token form
        $this->showTokenForm();

    }

    /*
    | Generates user password reset token
    */
    public function getCode()
    {

        //Validates user input before processing
        $this->validate
        ([
            'email' => 'required|email|max:255',
        ]);

        //check if the user exists
        if(Member::where('email', $this->email)->first())
        {


            //check for existing tokens
            if(PassReset::where('email', $this->email)->first()) {return $this->updateToken();}

            //If no previous toke found
            return $this->newToken();

        }

        //Error message in session
        session()->flash('error', 'User not found!');

        //Error message in sweetalert
        $this->alert('error', 'Email user not found!', 'Press Ok to try again');


        //Return statement to destroy the process
        return false;

    }

    /*
    | Verifies user supplied token
    */
    public function verifyToken()
    {

        //Checks if token field is empty
        $this->validate([
            'token' => 'required|max:12',
        ]);

        //Verify token along with email
        if (PassReset::where(['token' => $this->token, 'email' => $this->email])->first())
        {

            // Deletes the old token
            PassReset::where(['token' => $this->token, 'email' => $this->email])->delete();

            // Success Message for the user about validation status
            $this->alert('success', 'Reset token verified', 'Press Ok to continue');
            session()->flash('message', 'New password!.');

            // Display the change password form
            return $this->showChoosePass();

        }

        // Error Message for the user about validation status
        session()->flash('error', 'Invalid token, try again!.');
        //Error message in toastr

        $this->alert('error', 'Invalid Token!', 'Press Ok to try again');
        return false;

    }

    /*
    | Updates new user password
    */
    public function updatePass()
    {

        // Gets user information
        $userData = Member::where('email', $this->email)->first();

        // Validates new password
        $this->validate([
            'password'              => 'required|min:6',
            'password_confirmation' => 'min:6|required_with:password|same:password',
        ]);

        // Updates the password field of the particular user
        Member::where('email', $this->email)->update([
            'password' => Hash::make($this->password),
        ]);

        // Mails user concerning the update
        $data = [
            'email' => $this->email,
            'name'  => $userData->name,
            'app_name' => 'Loveworld Books',
            'site_email' => 'info@loveworldbooks.org'
        ];
        Mail::to($this->email)->send(new AccountUpdateEmail($data));

        //Success Message for the user
        session()->flash('message', 'Password Updated!');
        $this->alert('success', 'Password Updated successfully', 'You will be redirected shortly to the login page');

        //Redirects back to login
        redirect()->route('member.login');
    }

    public function alert($type, $title, $text="Press Ok to Continue"){
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => $type,
            'title' => $title,
            'text' => $text
        ]);
    }
    /*
    | Renders the livewire component to the browser
    */
    public function render()
    {
        return view('livewire.member.pages.member-password-reset');
    }
}
