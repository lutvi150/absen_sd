<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ControllerNotif;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    // return view('welcome');
    if (session()->get('data.role') == 'admin') {
        return redirect()->to('admin');
    } elseif (session()->get('data.role') == 'guru') {
        return redirect()->to('guru');
    } else {
        return view('login');
    }
});
// use for testing
Route::get('tes', [LoginController::class, 'form_login'])->name('tes');
Route::get('tes2', function () {
    // return session()->get('data');
    return response()->json([
        'status'  => 'success',
        'msg'     => 'success',
        'errors'   => null,
        'data'    => session()->get('data'),
        'content' => null,
    ], 200);
});
// end testing
Route::prefix('login')->group(function () {});
// admin route
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    // use for classroom
    Route::get('kelas/data', [KelasController::class, 'index'])->name('kelas');
    Route::post('kelas/kelas-add', [KelasController::class, 'store'])->name('kelas-add');
    Route::get('kelas/kelas-edit/{id}', [KelasController::class, 'edit'])->name('kelas-edit');
    Route::get('kelas/kelas-delete/{id}', [KelasController::class, 'destroy'])->name('kelas-delete');
    // student data 
    Route::get('data-siswa', [SiswaController::class, 'index'])->name('data-siswa');
    Route::get('siswa/siswa-add', [SiswaController::class, 'create'])->name('siswa-form');
    Route::post('siswa/siswa-add', [SiswaController::class, 'store'])->name('siswa-add');
    Route::get('siswa/siswa-edit/{id}', [SiswaController::class, 'edit'])->name('siswa-edit');
    Route::get('siswa/siswa-delete/{id}', [SiswaController::class, 'destroy'])->name('siswa-delete');
    // use for teacher
    Route::get('guru/data', [GuruController::class, 'index'])->name('data-guru');
    Route::post('guru/guru-add', [GuruController::class, 'create'])->name('guru-add');
    Route::get('guru/guru-edit/{id}', [GuruController::class, 'edit'])->name('guru-edit');
    Route::get('guru/guru-delete/{id}', [GuruController::class, 'destroy'])->name('guru-delete');
});
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('login', [LoginController::class, 'login'])->name('login');
// zenziva
Route::get('whatsapp/{phonenumber}', [ControllerNotif::class, 'sendWhatsapp'])->name('whatsapp');
Route::get('check-balance', [ControllerNotif::class, 'checkBalance'])->name('check-balance');
Route::post('send-message', [ControllerNotif::class, 'sendMessage'])->name('send-message');
