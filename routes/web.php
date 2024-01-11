<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\induk\KonversiSampahController;
use App\Http\Controllers\induk\PenjemputanSampahController;
use App\Http\Controllers\induk\SampahTreatmentController;
use App\Http\Controllers\induk\TarikTunaiUnitController;
use App\Http\Controllers\induk\TransaksiIndustriController;
use App\Http\Controllers\industri\IndukController;
use App\Http\Controllers\JenisSampahIndukController;
use App\Http\Controllers\KategoriSampah;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\SignUpUnitController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\JenisSampahUnitController;
use App\Http\Controllers\SignUpIndukController;
use App\Http\Controllers\KategoriSampahController;
use App\Http\Controllers\PenguranganSampahUnitController;
use App\Http\Controllers\PenjemputanSampahUnitController;
use App\Http\Controllers\RequestPendampinganUnitController;
use App\Http\Controllers\SignUpIndustriController;
use App\Http\Controllers\TarikTunaiController;
use App\Http\Controllers\TransaksiNasabahController;

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
Route::resource('signUpIndustri', SignUpIndustriController::class);

// edit&delete KategoriSampah
// Route::get('kategoriSampah/{kategoriSampah}/edit', 'KategoriSampahController@edit')->name('kategoriSampah.edit');
// Route::delete('kategoriSampah/{kategoriSampah}', [KategoriSampahController::class, 'destroy'])->name('kategoriSampah.destroy');

// Route::get('/jenis-sampah/{jenisSampah}/edit', [JenisSampahIndukController::class, 'edit'])->name('jenisSampah.edit');
// Route::delete('/jenis-sampah/{jenisSampah}', [JenisSampahIndukController::class, 'destroy'])->name('jenisSampah.destroy');


Route::middleware('auth')->group(function () {
Route::resource('dashboard', DashboardController::class);

//unit
Route::resource('nasabah', NasabahController::class);
Route::resource('kategoriSampah', KategoriSampahController::class);
Route::resource('jenisSampahInduk', JenisSampahIndukController::class);
Route::resource('jenisSampahUnit', JenisSampahUnitController::class);
Route::resource('transaksiNasabah', TransaksiNasabahController::class);
Route::resource('tarikTunaiNasabah', TarikTunaiController::class);
Route::resource('penguranganSampahUnit', PenguranganSampahUnitController::class);
Route::resource('requestPendampinganUnit', RequestPendampinganUnitController::class);
Route::resource('penjemputanSampahUnit', PenjemputanSampahUnitController::class);

//induk
Route::resource('penjemputanSampah', PenjemputanSampahController::class);
Route::resource('tarikTunaiUnit', TarikTunaiUnitController::class);
Route::resource('sampahTreatment', SampahTreatmentController::class);
Route::resource('konversiSampah', KonversiSampahController::class);
Route::resource('transaksiIndustri', TransaksiIndustriController::class);

//industri
Route::resource('induk', IndukController::class);
}); 
