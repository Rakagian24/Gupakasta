<?php

use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\AnggaranKegiatanController;
use App\Http\Controllers\AnggaranRekeningController;
use App\Http\Controllers\AnggaranSubKegiatanController;
use App\Http\Controllers\BukuObjekController;
use App\Models\Jenis;
use App\Models\Objek;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\Kelompok;
use App\Models\SubKegiatan;
use App\Models\RincianObjek;
use App\Models\KendaraanDinas;
use App\Models\SubRincianObjek;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NPDController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotaPencairanDanaController;
use App\Http\Controllers\RencanaKerjaAnggaranController;
use App\Http\Controllers\RincianNotaController;
use App\Models\Anggaran;
use App\Models\AnggaranKegiatan;

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

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth')->name('dashboard');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/program/urusan', [ProgramController::class, 'urusan']);
Route::get('/program/bidang_urusan', [ProgramController::class, 'bidangUrusan']);
Route::get('/program/program', [ProgramController::class, 'program']);
Route::get('/program/kegiatan', [ProgramController::class, 'kegiatan']);
Route::get('/program/sub_kegiatan', [ProgramController::class, 'subKegiatan']);

Route::get('/rekening/akun', [RekeningController::class, 'akun']);
Route::get('/rekening/kelompok', [RekeningController::class, 'kelompok']);
Route::get('/rekening/jenis', [RekeningController::class, 'jenis']);
Route::get('/rekening/objek', [RekeningController::class, 'objek']);
Route::get('/rekening/rincian_objek', [RekeningController::class, 'rincianObjek']);
Route::get('/rekening/sub_rincian_objek', [RekeningController::class, 'subRincianObjek']);

Route::resource('/anggaran/kegiatan', AnggaranKegiatanController::class)->middleware('auth');
Route::resource('/anggaran/sub_kegiatan', AnggaranSubKegiatanController::class)->middleware('auth');
Route::resource('/anggaran/rekening', AnggaranRekeningController::class)->middleware('auth');

Route::resource('rencana_kerja_anggaran', RencanaKerjaAnggaranController::class)->middleware('auth');

Route::resource('npd/nota_pencairan_dana', NotaPencairanDanaController::class)->middleware('auth');
Route::resource('npd/rincian_nota', RincianNotaController::class)->middleware('auth');

Route::get('/kdo', function () {
    return view('kendaraandinasoperasional', [
        'kendaraan' => KendaraanDinas::all()
    ]);
});
