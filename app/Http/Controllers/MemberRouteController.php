<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\MediaLinkView;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MemberRouteController extends BaseController
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

    public function memberDownloadPage($media_id)
    {
        return view('member.download_page', ['media_id' => $media_id]);
    }

    public function updateViews(Request $request)
    {
        //1.) Update the views
        $member = Member::where('slug', $request->member_slug)->first();
        if (MediaLinkView::where([
            ['media_link', '===', $request->path_name],
            ['ip_address', '===', \request()->ip()]
        ])->first()){
            return $this->sendResponse($member, 'Existing');
        }else{
            MediaLinkView::create([
                'media_link' => $request->path_name,
                'member_id' => $member->id,
                'ip_address' => \request()->ip()
            ]);
            return $this->sendResponse($member, 'Done o');
        }

//        //2.) Set the user details for likes
//        Session::put('member', Member::where('slug', $member_slug)->first());
//        return view('index');
    }

}
