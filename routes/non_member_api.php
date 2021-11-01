<?php

use App\Http\Controllers\API\NonMemberMediaStatController;
use App\Http\Controllers\MemberRouteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['cors', 'json.response', 'throttle:60,1']], function () {

    //User Media Links stats
    Route::get('non_member_media_link/likes', [NonMemberMediaStatController::class, 'getUserMediaLikes']);

    Route::post('non_member_media_link/downloads/update', [NonMemberMediaStatController::class, 'updateDownloads']);
    Route::post('non_member_media_link/downloads', [NonMemberMediaStatController::class, 'getUserMediaDownloads']);

    Route::post('non_member_share_link', [NonMemberMediaStatController::class, 'shareLink']);
    Route::post('non_member_media_link/shares', [NonMemberMediaStatController::class, 'getUserMediaShares']);

    Route::post('non_member_media_link_views/update', [NonMemberMediaStatController::class, 'updateViews']);
    Route::post('non_member_media_link/views', [NonMemberMediaStatController::class, 'getUserMediaViews']);

});
