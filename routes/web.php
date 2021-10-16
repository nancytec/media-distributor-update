<?php

use App\Http\Controllers\ChurchRouteController;
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

Route::name('home')->get('/', function () {
    return view('home');
});


Route::get('/auth/reset-password', [ChurchRouteController::class, 'churchLoginPage'])->name('reset');
