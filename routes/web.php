<?php

use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\DataAktivitasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabaRugiController;
use App\Http\Controllers\LapArusKas;
use App\Http\Controllers\LapLabaRugi;
use App\Http\Controllers\LapNeraca;
use App\Http\Controllers\NeracaController;
use App\Http\Controllers\Prediksi;
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

Route::get('/', [HomeController::class, 'index'])->middleware('auth');

Route::get('/login', [HomeController::class, 'loginPage'])->name('login')->middleware('guest');
Route::post('/login', [HomeController::class, 'authenticate']);
Route::get('/logout', [HomeController::class, 'logout']);

Route::group(['middleware' => ['auth', 'admin:admin']], function () {
    Route::get('/akun', [DataAkunController::class, 'index'])->name('akun');
    Route::get('/akun-olah', [DataAkunController::class, 'viewTambah']);
    Route::post('/akun-olah', [DataAkunController::class, 'tambah']);
    Route::get('/akun/edit/{id}', [DataAkunController::class, 'editAkun']);
    Route::post('/akun/edit/{id}/simpan', [DataAkunController::class, 'updateAkun']);
    Route::get('/akun/delete/{id}', [DataAkunController::class, 'delete']);

    Route::get('/aktivitas', [DataAktivitasController::class, 'index']);
    Route::get('/aktivitas-olah', [DataAktivitasController::class, 'viewTambah']);
    Route::post('/aktivitas-olah', [DataAktivitasController::class, 'tambah']);
    Route::get('/aktivitas/edit/{id}', [DataAktivitasController::class, 'editAktivitas']);
    Route::post('/aktivitas/edit/{id}/simpan', [DataAktivitasController::class, 'updateAktivitas']);
    Route::get('/aktivitas/delete/{id}', [DataAktivitasController::class, 'delete']);

    Route::get('/report-arus-kas', [LapArusKas::class, 'index']);
    Route::get('/report-arus-kas/monthly', [LapArusKas::class, 'indexBulanan']);
    Route::post('/report-arus-kas/filter', [LapArusKas::class, 'indexAfterFilter']);
    Route::post('/report-arus-kas/monthly/filter', [LapArusKas::class, 'indexAfterFilterMonthly']);
    Route::get('/exportpdf', [LapArusKas::class, 'exportpdf']);

    Route::get('/liquiditas', [HomeController::class, 'liquiditas']);
    Route::post('/liquiditas/filter', [HomeController::class, 'filterLiquiditas']);
    Route::get('/cashflow-coverage', [HomeController::class, 'cashflowcov']);
    Route::post('/cashflow-coverage/filter', [HomeController::class, 'filterCashflowcov']);
    Route::get('/perputaran-piutang', [HomeController::class, 'perpupiutang']);
    Route::post('/perputaran-piutang/filter', [HomeController::class, 'filterPerpupiutang']);
    Route::get('/prediksi', [Prediksi::class, 'index']);
    Route::POST('/prediksi/submit', [Prediksi::class, 'NaiveBayes']);
});

Route::get('/dashboard', [HomeController::class, 'dashboard']);

Route::get('/laba-rugi', [LabaRugiController::class, 'index'])->middleware('auth');
Route::post('/laba-rugi', [LabaRugiController::class, 'tambah'])->middleware('auth');
Route::post('/laba-rugi/filter', [LabaRugiController::class, 'indexAfterFilter'])->middleware('auth'); //Filter Laba-Rugi
Route::post('/laba-rugi/submit', [LabaRugiController::class, 'submit'])->middleware('auth'); //Submit Laba-Rugi

Route::get('/neraca', [NeracaController::class, 'index'])->middleware('auth');
Route::post('/neraca/filter', [NeracaController::class, 'indexAfterFilter'])->middleware('auth'); //Filter Neraca
Route::post('/neraca/submit', [NeracaController::class, 'submit'])->middleware('auth'); //Submit Neraca
Route::post('/neraca', [NeracaController::class, 'tambah'])->middleware('auth');



Route::get('/report-laba-rugi', [LapLabaRugi::class, 'index'])->middleware('auth');

Route::get('/report-neraca', [LapNeraca::class, 'index'])->middleware('auth');
