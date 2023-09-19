<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Attemp;
use App\Http\Controllers\Home;
use App\Http\Controllers\Kampus;
use App\Http\Controllers\Jurusan;
use App\Http\Controllers\Prodi;
use App\Http\Controllers\Jadwal;

/*                                                                       *\
|-------------------------------------------------------------------------|
| ============================== Web Routes ==============================|
|-------------------------------------------------------------------------|
*/                                                                         

Route::get('/', function () {
    return redirect('login');
});

//login
Route::post('/login_user', [Attemp::class, 'loginUser']);
Route::post('/logout_user', [Attemp::class, 'logoutUser'])->name('logout');
Route::get('/login', [Attemp::class, 'login'])->name('login');
//Auth::routes();

//home 
Route::get('/home', [Home::class, 'index']);

//kampus 
Route::get('/kampus', [Kampus::class, 'index']);
Route::get('/kampus/edit/{id}', [Kampus::class, 'edit']);
Route::get('/kampus/delete/{id}', [Kampus::class, 'delete']);
Route::post('/kampus/store', [Kampus::class, 'store']);
Route::post('/kampus/update/{id}', [Kampus::class, 'update']);

//jurusan 
Route::get('/jurusan', [Jurusan::class, 'index']);
Route::get('/jurusan/edit/{id}', [Jurusan::class, 'edit']);
Route::get('/jurusan/delete/{id}', [Jurusan::class, 'delete']);
Route::post('/jurusan/store', [Jurusan::class, 'store']);
Route::post('/jurusan/update/{id}', [Jurusan::class, 'update']);

//prodi 
Route::get('/prodi', [Prodi::class, 'index']);
Route::get('/prodi/edit/{id}', [Prodi::class, 'edit']);
Route::get('/prodi/delete/{id}', [Prodi::class, 'delete']);
Route::post('/prodi/store', [Prodi::class, 'store']);
Route::post('/prodi/update/{id}', [Prodi::class, 'update']);

//jadwal 
Route::get('/jadwal', [Prodi::class, 'index']);
Route::get('/jadwal/edit/{id}', [Prodi::class, 'edit']);
Route::get('/jadwal/delete/{id}', [Prodi::class, 'delete']);
Route::post('/jadwal/store', [Prodi::class, 'store']);
Route::post('/jadwal/update/{id}', [Prodi::class, 'update']);
Route::get('/jadwal/kuota_set/{id}', [Prodi::class, 'setKuota']);
Route::post('/jadwal/kuota_set/store', [Prodi::class, 'setKuotaPost']);



