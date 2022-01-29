<?php
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
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
    return view('welcome');
});

Route::get('/guru', [GuruController::class, 'index']);

Route::get('/guru/tambah', [GuruController::class, 'tambah']);

Route::post('/guru/store', [GuruController::class, 'store']);

Route::get('/guru/edit/{id}', [GuruController::class, 'edit']);

Route::post('/guru/update', [GuruController::class, 'update']);

Route::get('/guru/hapus/{id}', [GuruController::class, 'hapus']);

Route::get('/guru/cari', [GuruController::class, 'cari']);

Route::get('/siswa', [SiswaController::class, 'index']);

Route::get('/siswa/tambah', [SiswaController::class, 'tambah']);

Route::post('/siswa/store', [SiswaController::class, 'store']);

Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);

Route::post('/siswa/update', [SiswaController::class, 'update']);

Route::get('/siswa/hapus/{id}', [SiswaController::class, 'hapus']);

Route::get('/siswa/cari', [SiswaController::class, 'cari']);

Route::get('/nilai', [SiswaController::class, 'indexNilai']);

Route::get('/nilai/cari', [SiswaController::class, 'cariNilai']);