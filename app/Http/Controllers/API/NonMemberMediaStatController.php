<?php

namespace App\Http\Controllers\API;

use App\Models\MediaLinkDownload;
use App\Models\MediaLinkLike;
use App\Models\MediaLinkShare;
use App\Models\MediaLinkView;
use App\Models\MemberMediaLinkView;
use App\Models\NonMember;
use App\Models\NonMemberMediaLinkDownload;
use App\Models\NonMemberMediaLinkShare;
use App\Models\NonMemberMediaLinkView;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Media;
use App\Models\Comment;
use App\Models\MediaView;
use Intervention\Image\ImageManagerStatic;


class NonMemberMediaStatController extends BaseController
{

    public function getUserMediaLikes()
    {
        $referral_link = url()->previous();
        $results = MediaLinkLike::where('media_link', $referral_link)->get();
        return $this->sendResponse(count($results));
    }

    public function getUserMediaViews(Request $request)
    {
        $results = NonMemberMediaLinkView::where('media_link', $request->path_name)->get();
        return $this->sendResponse(count($results));
    }

    public function getUserMediaDownloads(Request $request)
    {
        $results = NonMemberMediaLinkDownload::where('media_link', $request->path_name)->first();
        if ($results){
            return $this->sendResponse($results->count);
        }
        return 0;
    }

    public function getUserMediaShares(Request $request)
    {
        $results = NonMemberMediaLinkShare::where('media_link', $request->path_name)->first();
        if ($results){
            return $this->sendResponse($results->count);
        }
        return 0;
    }

    /**
     * increment media like count
     * @param  [type]  $id      [description]
     */
    public function like(Request $request, $id)
    {
        $media = Media::firstWhere('id', $id);
        if (!$media) {
            return $this->sendError('Media Not Found', [], 404);
        }
        $media->likes += 1;
        $media->save();

            MediaLinkLike::create([
                'media_link' => url()->previous(),
            ]);

        return $this->sendResponse(true);
    }

    /**
     * increment media view count
     * also increment count in media_view table which ties a media views with a particular user
     * @param  [type]  $id      [description]
     */
    public function view(Request $request, $media_id, $user_id)
    {
        $media = Media::firstWhere('id', $media_id);
        $user = User::firstWhere('id', $user_id);
        if (!$media || !$user) {
            return $this->sendError('Invalid link', [], 403);
        }

        // $media_view = MediaView::where('user_id', $user_id)->where('media_id', $media_id)->first();
        // if (!$media_view) {
        //     $media_view = MediaView::create([
        //         'user_id' => $user_id,
        //         'media_id' => $media_id,
        //     ]);
        // }
        // $media_view->count += 1;
        // $media_view->save();


        // create a new media_view row on every view
        // this will aid in recording view times when doing analytics
        $media_view = MediaView::create([
            'user_id' => $user_id,
            'media_id' => $media_id,
            'count' => 1,
        ]);


        $media->views += 1;
        $media->save();

        return $this->sendResponse(true);
    }

    public function viewMemberMediaLink(Request $request, $media_id, $user_id, $member_slug)
    {
        $media = Media::firstWhere('id', $media_id);
        $user = User::firstWhere('id', $user_id);
        if (!$media || !$user) {
            return $this->sendError('Invalid link', [], 403);
        }

        // $media_view = MediaView::where('user_id', $user_id)->where('media_id', $media_id)->first();
        // if (!$media_view) {
        //     $media_view = MediaView::create([
        //         'user_id' => $user_id,
        //         'media_id' => $media_id,
        //     ]);
        // }
        // $media_view->count += 1;
        // $media_view->save();


        // create a new media_view row on every view
        // this will aid in recording view times when doing analytics
        $media_view = MediaView::create([
            'user_id' => $user_id,
            'media_id' => $media_id,
            'count' => 1,
        ]);


        $media->views += 1;
        $media->save();


        //Increase the user Media Link View Also
//        $link = url()->full();
//        $view = MemberMediaLinkView::create([
//           'link' => $link,
//            'ip_address' => request()->ip(),
//            'member_slug' => $member_slug,
//            'count' => 1
//        ]);
        return $this->sendResponse(true);

    }

    /**
     * increment share share count
     * @param  [type]  $id      [description]
     */
    public function share(Request $request, $id)
    {
        $media = Media::firstWhere('id', $id);
        if (!$media) {
            return $this->sendError('Media Not Found', [], 404);
        }

        $media->shares += 1;
        $media->save();


        return $this->sendResponse(true);
    }


    ////////////////////////////
    // User behaviour methods //
    ////////////////////////////

    public function updateDownloads(Request $request){
        $link = NonMemberMediaLinkDownload::where('media_link', $request->path_name)->first();
        if ($link){
            $link->count += 1;
            $link->save();
            return $this->sendResponse($request->all(), 'It got here');
        }
    }

    public function shareLink(Request $request)
    {
        $link = NonMemberMediaLinkShare::where('media_link', $request->path_name)->first();
        if ($link){
            $link->count += 1;
            $link->save();
            return $this->sendResponse($request->all(), 'It got here');
        }
    }

    public function updateViews(Request $request)
    {
        //1.) Update the views
        $member = NonMember::where('unique_id', $request->unique_id)->first();
        if (NonMemberMediaLinkView::where([
            ['media_link', '===', $request->path_name],
            ['ip_address', '===', \request()->ip()]
        ])->first()){
            return $this->sendResponse($member, 'Existing');
        }else{
            NonMemberMediaLinkView::create([
                'media_link' => $request->path_name,
                'non_member_id' => $member->id,
                'ip_address' => \request()->ip()
            ]);
            return $this->sendResponse($member, 'Done o');
        }

//        //2.) Set the user details for likes
//        Session::put('member', Member::where('slug', $member_slug)->first());
//        return view('index');
    }



}

