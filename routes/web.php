<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\KasMasjidController;
use App\Http\Controllers\KasSosialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


Route::get('/', [dashboardController::class, 'landing'])->name('landing');


Route::get('/login', function () {
    return view('auth.login ');
});

Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

//get data kas masjid
Route::get('/kas-masjid-rekap', [KasMasjidController::class, 'rekap']);
Route::get('/kas-masjid-pengeluaran', [KasMasjidController::class, 'keluar']);
Route::get('/kas-masjid-pemasukan', [KasMasjidController::class, 'masuk']);

//post data kas masjid
Route::post('kas-masjid/pemasukan/tambah', [KasMasjidController::class, 'storePemasukan'])->name('kasmasjid.masuk');
Route::post('kas-masjid/pengeluaran/tambah', [KasMasjidController::class, 'storePengeluaran'])->name('kasmasjid.masuk');

//edit data kas masjid
Route::put('kas-masjid-pemasukan/edit/{id}', [KasMasjidController::class, 'editPemasukan'])->name('kasmasjid.editMasuk');
Route::put('kas-masjid-pengeluaran/edit/{id}', [KasMasjidController::class, 'editPengeluaran'])->name('kasmasjid.editKeluar');

//delete kas masjid
Route::get('/kas-masjid/delete/{id}', [KasMasjidController::class, 'destroy']);

Route::post('store-admin', [UserController::class, 'store'])->name('admin.store');



//get data kas sosial
Route::get('/kas-sosial-rekap', [KasSosialController::class, 'rekap']);
Route::get('/kas-sosial-pengeluaran', [KasSosialController::class, 'keluar']);
Route::get('/kas-sosial-pemasukan', [KasSosialController::class, 'masuk']);

//post data kas sosial
Route::post('kas-sosial/pemasukan/tambah', [KasSosialController::class, 'storePemasukan'])->name('kassosial.masuk');
Route::post('kas-sosial/pengeluaran/tambah', [KasSosialController::class, 'storePengeluaran'])->name('kassosial.masuk');

//edit data kas sosial
Route::put('kas-sosial-pemasukan/edit/{id}', [KasSosialController::class, 'editPemasukan'])->name('kassosial.editMasuk');
Route::put('kas-sosial-pengeluaran/edit/{id}', [KasSosialController::class, 'editPemasukan'])->name('kassosial.editMasuk');

//delete kas sosial
Route::get('/kas-sosial/delete/{id}', [KasSosialController::class, 'destroy']);

//Admin
Route::get('/admin', [UserController::class, 'index'])->name('admin.index');
Route::post('/store-admin', [UserController::class, 'store']);
Route::get('/admin-destroy/{id}', [UserController::class, 'destroy']);

//Bendahara
Route::get('/bendahara', [BendaharaController::class, 'index'])->name('bendahara.index');
Route::post('/store-bendahara', [BendaharaController::class, 'store']);
Route::get('/bendahara-destroy/{id}', [BendaharaController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/events', [App\Http\Controllers\EventsController::class, 'index'])->name('event');
Route::post('/events/tambah', [App\Http\Controllers\EventsController::class, 'store'])->name('event.store');
Route::get('/events/{id}', [EventsController::class, 'destroy']);


