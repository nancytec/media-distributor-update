<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRouteController extends Controller
{
    public function adminDashboardPage()
    {
        return view('admin.admin_dashboard');
    }

    public function adminNewMediaPage()
    {
        return view('admin.admin_new_media');
    }

    public function adminAnalyticsPage()
    {
        return view('admin.admin_analytics');
    }


    public function adminAddChurchPage()
    {
        return view('admin.admin_add_church');
    }

    public function adminChurchesPage()
    {
        return view('admin.admin_church');
    }

    public function adminGuestsPage()
    {
        return view('admin.admin_guest');
    }

    public function adminMissionaryPage()
    {
        return view('admin.admin_missionary');
    }

    public function adminViewChurchPage($church_id)
    {
        return view('admin.admin_view_church', ['church_id' => $church_id]);
    }

    public function adminViewGuestPage($guest_id)
    {
        return view('admin.admin_view_guest', ['guest_id' => $guest_id]);
    }

    public function adminViewMissionaryPage($missionary_id)
    {
        return view('admin.admin_view_missionary', ['missionary_id' => $missionary_id]);
    }

    public function adminViewMemberPage($member_id)
    {
        return view('admin.admin_view_member', ['member_id' => $member_id]);
    }

    public function adminAllMediaPage()
    {
        return view('admin.admin_all_media');
    }

    public function adminViewMediaPage($media_id)
    {
        return view('admin.admin_view_media', ['media_id' => $media_id]);
    }

    public function adminNewMediaAudioPage($media_id)
    {
        return view('admin.admin_new_media_audio', ['media_id' => $media_id]);
    }

    public function adminMediaTranslationsPage($media_id)
    {
        return view('admin.admin_media_translation', ['media_id' => $media_id]);
    }

    public function adminMediaAudioTranslationsPage($media_id)
    {
        return view('admin.admin_media_audio_translation', ['media_id' => $media_id]);
    }
}
