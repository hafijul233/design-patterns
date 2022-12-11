<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
});

Route::get('login', function () {
    \Illuminate\Support\Facades\Auth::attempt(['email' => 'test@example.com', 'password' => 'password']);
    return redirect()->to('dashboard');
});

Route::get('dashboard', function (Request $request) {
    dd(\App\Singletons\Setting::instance()->all());
});

Route::get('singleton-test', [\App\Http\Controllers\SettingTestController::class, 'test']);
