<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
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
    Route::get('kelas/data', [AdminController::class, 'data_kelas'])->name('kelas');
    Route::post('kelas/kelas-add', [AdminController::class, 'data_kelas_add_post'])->name('kelas-add');
    Route::get('kelas/kelas-edit/{id}', [AdminController::class, 'data_kelas_edit'])->name('kelas-edit');
    
    Route::get('data-siswa', [AdminController::class, 'data_siswa'])->name('data-siswa');
    Route::get('data-guru', [AdminController::class, 'data_guru'])->name('data-guru');
});
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('login', [LoginController::class, 'login'])->name('login');
