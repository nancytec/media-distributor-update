<?php

use App\Http\Controllers\API\ChurchMediaStatController;
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
    Route::get('church_media_link/likes', [ChurchMediaStatController::class, 'getUserMediaLikes']);

    Route::post('church_media_link/downloads/update', [ChurchMediaStatController::class, 'updateDownloads']);
    Route::post('church_media_link/downloads', [ChurchMediaStatController::class, 'getUserMediaDownloads']);

    Route::post('church_share_link', [ChurchMediaStatController::class, 'shareLink']);
    Route::post('church_media_link/shares', [ChurchMediaStatController::class, 'getUserMediaShares']);

    Route::post('church_media_link_views/update', [ChurchMediaStatController::class, 'updateViews']);
    Route::post('church_media_link/views', [ChurchMediaStatController::class, 'getUserMediaViews']);

});
