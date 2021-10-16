<?php


use App\Http\Controllers\MemberAuthController;
use App\Http\Controllers\MemberRouteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Member Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register member web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/church/generate-member-link', [MemberRouteController::class, 'memberGenerateReferralLinkPage'])->name('member.generate-media-link');


Route::prefix('member')->name('member.')->group(function (){
    Route::get('/login', [MemberRouteController::class, 'memberLoginPage'])->name('login');
    Route::get('/reset', [MemberAuthController::class, 'resetPassword'])->name('reset');

    Route::middleware(['auth:member'])->group(function () {
        Route::get('/dashboard', [MemberRouteController::class, 'memberDashboardPage'])->name('dashboard');
        Route::get('/links', [MemberRouteController::class, 'memberMediaLinksPage'])->name('links');
        Route::get('/logout',    [MemberAuthController::class, 'logout'])->name('logout');
    });
});



