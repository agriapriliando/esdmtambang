<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::get('logout', function () {
    Http::post('http://127.0.0.1:8000/api/logout');
    return redirect('login')->with('success', 'Anda Berhasil Logout');
});
Route::get('perusahaan', function () {
    return view('perusahaan');
});
Route::get('berkas', function () {
    return view('berkas');
})->name('berkas');
