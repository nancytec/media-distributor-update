<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function adminLoginPage()
    {
        return view('admin.admin_login');
    }

    public function resetPassword()
    {
        return view('admin.admin_reset');
    }

}
