<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChurchAuthController extends Controller
{
    public function logout() {
        Auth::logout();
        return redirect()->route('church.login');
    }
    public function resetPassword()
    {
        return view('church.church_reset');
    }
}
