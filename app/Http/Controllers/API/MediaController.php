<?php

namespace App\Http\Controllers\API;

use App\Models\BookBeneficiary;
use App\Models\Guest;
use App\Models\MediaLinkDownload;
use App\Models\MediaLinkLike;
use App\Models\MediaLinkShare;
use App\Models\MediaLinkView;
use App\Models\MemberMediaLinkView;
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


class MediaController extends BaseController
{

    /**
     * get all media
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getAllMedia(Request $request)
    {
        return $this->sendResponse(Media::orderByDesc('id')->get());
    }


    /**
     * get media info
     * @param  Request $request
     * @param  [type]  $id      media id
     * @return [type]
     */
    public function getMedia(Request $request, $id)
    {
        $media = Media::firstWhere('id', $id);
        if ($id == '-1') {
            $media = Media::orderByDesc('id')->first();
        }
        if (!$media) {
            return $this->sendError('Media Not Found', [], 404);
        }
        return $this->sendResponse($media);
    }

    public function getUserMediaLikes()
    {
        $referral_link = url()->previous();
        $results = MediaLinkLike::where('media_link', $referral_link)->get();
        return $this->sendResponse(count($results));
    }

    public function getUserMediaViews(Request $request)
    {
        $results = MediaLinkView::where('media_link', $request->path_name)->get();
        return $this->sendResponse(count($results));
    }

    public function getUserMediaDownloads(Request $request)
    {
        $results = MediaLinkDownload::where('media_link', $request->path_name)->first();
        if ($results){
            return $this->sendResponse($results->count);
        }
        return 0;
    }

    public function getUserMediaShares(Request $request)
    {
        $results = MediaLinkShare::where('media_link', $request->path_name)->first();
        if ($results){
            return $this->sendResponse($results->count);
        }
        return 0;
    }


    /**
     * Get latest PDF
     */
    public function getLatestPDF(Request $request) {
        $media = Media::where('type', 'pdf')->orderByDesc('id')->first();
        if (!$media) {
            return $this->sendResponse([]);
        }
        return $this->sendResponse($media);
    }

    /**
     * get media comments
     * @param  Request $request
     * @param  [type]  $id      media id
     * @return [type]
     */
    public function getMediaComments(Request $request, $id)
    {
        $media = Media::firstWhere('id', $id);
        if (!$media) {
            return $this->sendError('Media Not Found', [], 404);
        }

        return $this->sendResponse(Comment::where('media_id', $media->id)->orderByDesc('id')->get());
    }


    //////////////////////////////
    // User interaction methods //
    //////////////////////////////

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
     * add a new comment on media
     * @param  [type]  $id      [description]
     */
    public function comment(Request $request, $id)
    {
        $media = Media::firstWhere('id', $id);
        if (!$media) {
            return $this->sendError('Media Not Found', [], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required | string | max:255',
            'email' => 'required | email',
            'comment' => 'required | string',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Input Validation Failed', $validator->errors()->all(), 422);
        }

        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->comment,
            'media_id' => $media->id,
        ]);

        $media->comments += 1;
        $media->save();
        return $this->sendResponse(true, "Comment added successfully");
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

    /**
     * increment media open count
     */
    public function media_open(Request $request, $id)
    {
        $media = Media::firstWhere('id', $id);
        if (!$media) {
            return $this->sendError('Media Not Found', [], 404);
        }
        $media->user_open += 1;
        $media->save();
        return $this->sendResponse(true);
    }

    /**
     * increment media bounce count
     */
    public function media_bounce(Request $request, $id)
    {
        $media = Media::firstWhere('id', $id);
        if (!$media) {
            return $this->sendError('Media Not Found', [], 404);
        }
        $media->user_bounce += 1;
        $media->save();
        return $this->sendResponse(true);
    }

    /**
     * increment media engage count
     */
    public function media_engage(Request $request, $id)
    {
        $media = Media::firstWhere('id', $id);
        if (!$media) {
            return $this->sendError('Media Not Found', [], 404);
        }
        $media->user_engage += 1;
        $media->save();
        return $this->sendResponse(true);
    }


    /**
     * Uploads a media.
     *
     * @param      \Illuminate\Http\Request  $request  The request
     */
    public function uploadMedia(Request $request)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'name' => 'required | string',
            'media_file' => 'required | mimes:mp4,webm,3gp,pdf,3gpp,mpga,wav,mp3',
        ]);
        if ($validator->fails()) {
            $err_msg = $request->name
                ? 'Uploaded media must be either a video, music pdf file'
                : 'Missing required field';
            return $this->sendError($err_msg, $validator->errors()->all(), 422);
        }

        $path = "[file missing]";
        $ftype = "video";

        if ($request->hasFile('media_file')) {
            if ($request->file('media_file')->isValid()) {
                $f_name = Str::random(50);
                $f_extension = $request->media_file->extension();
                $file_name = "$f_name.$f_extension";

//                $this->storeFile($request->media_file, $file_name);
                $path = $request->media_file->store('', ['disk' => 'public_uploads']); // returns the filename
//                $request->media_file->storeAs('/public', $file_name);
//                $path = $file_name;

                if ($f_extension == "pdf") {
                    $ftype = "pdf";
                }
            }
        }

        // add to DB
        Media::create([
            'name' => $request->name,
            'path' => $path,
            'type' => $ftype
        ]);

        return $this->sendResponse(true, "File Uploaded");
    }

    public function storeFile($file, $name)
    {
        $original_filename = $file->getClientOriginalName();
        Storage::disk('public_uploads')->put($name, $file);
        return $name;
    }


    /**
     * delete media
     *
     * @param      \Illuminate\Http\Request  $request  The request
     */
    public function deleteMedia(Request $request, $id)
    {
        $media = Media::firstWhere('id', $id);
        if (!$media) {
            return $this->sendError('Media Not Found', [], 404);
        }

        $media->delete();
        return $this->sendResponse(true);
    }


    /**
     * Sends a download link to user.
     *
     * @param \Illuminate\Http\Request  $request  The request
     */
    public function sendLink(Request $request)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'path' => 'required | string',
            'email' => 'required | email',
            'media_name' => 'required | string',
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
//
        $guest = Guest::where('email', $request->email)->first();
        $data = [
//            'path' => $request->path,
            'path' => 'media/download/1',
            'name' => $guest->name,
//            'name' => explode("@", $request->email)[0],
            'media_name' => $request->media_name
        ];


        Mail::send('mail', $data, function($message) use($request, $data) {
            $message->to($request->email, $data['name'])->subject('Media download link');
            $message->from('no-reply@nowthatyouarbornagain.org','Now That You Are Born Again');
        });

//       $link = MediaLinkDownload::where('media_link', url()->previous())->first();
//        if ($link){
//            $link->count += 1;
//            $link->save();
//        }

        return $this->sendResponse($request->all(), 'It got here');
    }

    /**
     * Sends a download link to user.
     *
     * @param \Illuminate\Http\Request  $request  The request
     */
    public function giftLink(Request $request)
    {

        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'email' => 'required | email',
            'media_name' => 'required | string',
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
//
        $data = [
//            'path' => $request->path,
            'path' => 'media/download/1',
            'name' => $request->name,
            'sender_name' => $request->sender_name,
            'media_name' => $request->media_name
        ];

        Session::put(['sender_name' => $request->sender_name]);

        Mail::send('email.media_link_shared', $data, function($message) use($request, $data) {
            $message->to($request->email, $data['name'])->subject('Media download link');
            $message->from('no-reply@nowthatyouarbornagain.org', 'Now That You Are Born Again');
        });

        $this->saveBeneficiary($request);
        return $this->sendResponse($request->all(), 'It got here');
    }

    /**
     * Adds a guest user to DB.
     *
     * @param      \Illuminate\Http\Request  $request  The request
     */
    public function saveBeneficiary(Request $request)
    {
        if (!BookBeneficiary::firstWhere('email', $request->email)) {
            try {
                $guest =  BookBeneficiary::create([
                    'sender_name' => $request->sender_name,
                    'sender_email' => $request->sender_email,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'country' => $request->country,
                ]);
                return true;
            }catch (\Exception $e){
                return false;
            }

        }
    }

    public function updateDownloads(Request $request){
        $link = MediaLinkDownload::where('media_link', $request->path_name)->first();
        if ($link){
            $link->count += 1;
            $link->save();
            return $this->sendResponse($request->all(), 'It got here');
        }
    }

    public function shareLink(Request $request)
    {
        $link = MediaLinkShare::where('media_link', $request->path_name)->first();
        if ($link){
            $link->count += 1;
            $link->save();
            return $this->sendResponse($request->all(), 'It got here');
        }
    }

}

