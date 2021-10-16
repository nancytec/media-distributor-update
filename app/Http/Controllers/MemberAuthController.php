<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberAuthController extends Controller
{
    public function logout() {
        Auth::logout();
        return redirect()->route('member.login');
    }

    public function resetPassword()
    {
        return view('member.member_reset');
    }
}
