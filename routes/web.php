<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\KategoriSampah;
use App\Http\Controllers\KategoriSampahController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\SignUpIndukController;
use App\Http\Controllers\SignUpUnitController;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('loginAction', [AuthController::class, 'loginAction'])->name('loginAction');
Route::resource('signUpInduk', SignUpIndukController::class);
Route::resource('signUpUnit', SignUpUnitController::class);


Route::middleware('auth')->group(function () {
Route::resource('dashboard', DashboardController::class);
Route::resource('nasabah', NasabahController::class);
Route::resource('kategoriSampah', KategoriSampahController::class);
Route::resource('jenisSampah', JenisSampahController::class);
});
