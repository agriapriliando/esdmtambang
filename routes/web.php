<?php

use App\Http\Controllers\LoginController;
use App\Livewire\Companies;
use App\Livewire\CompanyEdit;
use App\Livewire\Docs;
use App\Livewire\NomorskEdit;
use Illuminate\Support\Facades\Auth;
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
    return redirect('berkas');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::get('logout', function () {
    Http::post('https://dev.ditaria.com/api/logout');
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('login')->with('success', 'Anda Berhasil Logout');
});
Route::middleware(['auth'])->group(function () {
    Route::get('perusahaan', Companies::class)->name('perusahaan')->middleware('auth');
    Route::get('perusahaan/{id}', CompanyEdit::class)->middleware('auth');
    Route::get('nomorsk/{id}', NomorskEdit::class)->middleware('auth');

    Route::get('berkas', Docs::class)->name('berkas');

    Route::get('download/{id}', [Docs::class, 'download'])->name('download');
});
