<?php


use App\Http\Controllers\ChurchAuthController;
use App\Http\Controllers\ChurchRouteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Church Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register church web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [ChurchRouteController::class, 'churchLoginPage'])->name('login');
Route::prefix('church')->name('church.')->group(function () {
    Route::get('/login', [ChurchRouteController::class, 'churchLoginPage'])->name('login');
    Route::get('/reset', [ChurchAuthController::class, 'resetPassword'])->name('reset');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard',                        [ChurchRouteController::class, 'churchDashboardPage'])->name('dashboard');
        Route::get('/analytics',                        [ChurchRouteController::class, 'churchAnalyticsPage'])->name('analytics');
        Route::get('/members-list',                     [ChurchRouteController::class, 'churchMembersListPage'])->name('members-list');
        Route::get('/new-member',                       [ChurchRouteController::class, 'churchNewMemberPage'])->name('new-member');
        Route::get('/shared-links',                     [ChurchRouteController::class, 'churchSharedLinksPage'])->name('shared-links');
        Route::get('/members-view/{member_id}',         [ChurchRouteController::class, 'churchMembersViewPage'])->name('members-view');
        Route::get('/members-link-view/{member_email}', [ChurchRouteController::class, 'churchMembersLinkViewPage'])->name('members-link-view');
        Route::get('/logout',                           [ChurchAuthController::class, 'logout'])->name('logout');
    });
});



