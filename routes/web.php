<?php

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
    return view('dashboard');
});

Route::get('/gu', function () {
    return view('gantiuang');
});

Route::get('/bbp', function () {
    return view('bukubesarpembantu');
});

Route::get('/bku', function () {
    return view('bukukasumum');
});

Route::get('/bpp', function () {
    return view('bukupembantupajak');
});

Route::get('/bro', function () {
    return view('bukurincianobjek');
});

Route::get('/kkk', function () {
    return view('kartukendalikegiatan');
});

// Route::get('/npd', function () {
//     return view('notapencairandana');
// });

Route::get('/kdo', function () {
    return view('kendaraandinasoperasional', [
        'kendaraan' => KendaraanDinas::all()
    ]);
});

Route::get('/formbro', function () {
    return view('/form/formrincianobjek');
});

Route::resource('npd/nota', NotaController::class)->middleware('auth');
Route::resource('bro/objek', BukuObjekController::class)->middleware('auth');

Route::get('/rekening/urusan', [ProgramController::class, 'urusan']);
Route::get('/rekening/bidang_urusan', [ProgramController::class, 'bidangUrusan']);
Route::get('/rekening/program', [ProgramController::class, 'program']);
Route::get('/rekening/kegiatan', [ProgramController::class, 'kegiatan']);
Route::get('/rekening/sub_kegiatan', [ProgramController::class, 'subKegiatan']);

Route::get('/program/akun', [RekeningController::class, 'akun']);
Route::get('/program/kelompok', [RekeningController::class, 'kelompok']);
Route::get('/program/jenis', [RekeningController::class, 'jenis']);
Route::get('/program/objek', [RekeningController::class, 'objek']);
Route::get('/program/rincian_objek', [RekeningController::class, 'rincianObjek']);
Route::get('/program/sub_rincian_objek', [RekeningController::class, 'subRincianObjek']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');
