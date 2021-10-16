<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberRouteController extends Controller
{
    public function memberLoginPage()
    {
        return view('member.member_login');
    }

    public function memberDashboardPage()
    {
        return view('member.member_dashboard');
    }

    public function memberMediaLinksPage()
    {
        return view('member.member_media_links');
    }

    public function memberGenerateReferralLinkPage()
    {
        return view('member.member_generate_referral_link');
    }

}
