<?php


use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminRouteController;
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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'adminLoginPage'])->name('login');
    Route::get('/reset', [AdminAuthController::class, 'adminPassword'])->name('reset');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/logout',                      [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard',                   [AdminRouteController::class, 'adminDashboardPage'])->name('dashboard');
        Route::get('/all-media',                   [AdminRouteController::class, 'adminAllMediaPage'])->name('all-media');
        Route::get('/media/{media_id}',            [AdminRouteController::class, 'adminViewMediaPage'])->name('media-view');
        Route::get('/translation/{media_id}',      [AdminRouteController::class, 'adminMediaTranslationsPage'])->name('media-translation');
        Route::get('/add-church',                  [AdminRouteController::class, 'adminAddChurchPage'])->name('add-church');
        Route::get('/churches',                    [AdminRouteController::class, 'adminChurchesPage'])->name('churches');
        Route::get('/churches/{church_id}',        [AdminRouteController::class, 'adminViewChurchPage'])->name('church-view');
        Route::get('/member/{member_id}',          [AdminRouteController::class, 'adminViewMemberPage'])->name('member-view');
        Route::get('/guests',                      [AdminRouteController::class, 'adminGuestsPage'])->name('guests');
        Route::get('/guests/{guest_id}',           [AdminRouteController::class, 'adminViewGuestPage'])->name('guest-view');

    });
});



