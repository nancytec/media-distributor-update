<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChurchRouteController extends Controller
{
    public function churchLoginPage()
    {
        return view('church.church_login');
    }

    public function churchDashboardPage()
    {
        return view('church.church_dashboard');
    }

    public function churchAnalyticsPage()
    {
        return view('church.church_analytics');
    }

    public function churchMembersListPage()
    {
        return view('church.church_members_list');
    }

    public function churchAllMediaPage()
    {
        return view('church.church_all_media');
    }

    public function churchViewMediaPage($media_id)
    {
        return view('church.church_view_media', ['media_id' => $media_id]);
    }


    public function churchMembersViewPage($member_id)
    {
        return view('church.church_members_view', ['member_id' => $member_id]);
    }

    public function churchMembersLinkViewPage($member_email)
    {
        return view('church.church_members_link_view', ['member_email' => $member_email]);
    }

    public function churchNewMemberPage()
    {
        return view('church.church_new_member');
    }

    public function churchSharedLinksPage()
    {
        return view('church.church_shared_links');
    }


}
