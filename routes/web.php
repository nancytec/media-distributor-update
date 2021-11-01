<?php

use App\Http\Controllers\ChurchRouteController;
use App\Http\Controllers\MemberRouteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('select-account')->get('/account', function () {
    return view('select_account');
});

Route::get('/', [MemberRouteController::class, 'memberGenerateReferralLinkPage'])->name('landing-page');

//
//Route::name('home')->get('/', function () {
//    return view('home');
//});


Route::get('/auth/reset-password', [ChurchRouteController::class, 'churchLoginPage'])->name('reset');
Route::get('/media/download/{media_id}', [MemberRouteController::class, 'memberDownloadPage'])->name('download');


