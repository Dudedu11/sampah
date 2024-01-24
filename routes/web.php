<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\fbj\InformasiController;
use App\Http\Controllers\fbj\KelolaAkunController;
use App\Http\Controllers\fbj\ListIndukController;
use App\Http\Controllers\fbj\ListIndustriController;
use App\Http\Controllers\fbj\ListRequestPendampinganController;
use App\Http\Controllers\fbj\ListTransaksiIndukController;
use App\Http\Controllers\fbj\ListTransaksiNasabahController;
use App\Http\Controllers\fbj\ListTransaksiUnitController;
use App\Http\Controllers\fbj\ListUnitController;
use App\Http\Controllers\induk\KonversiSampahController;
use App\Http\Controllers\induk\LaporanTransaksiIndustriController;
use App\Http\Controllers\induk\PenjemputanSampahController;
use App\Http\Controllers\induk\SampahTreatmentController;
use App\Http\Controllers\induk\TarikTunaiUnitController;
use App\Http\Controllers\induk\TransaksiIndustriController;
use App\Http\Controllers\industri\IndukController;
use App\Http\Controllers\industri\SampahIndustriController;
use App\Http\Controllers\JenisSampahIndukController;
use App\Http\Controllers\KategoriSampah;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\SignUpUnitController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\JenisSampahUnitController;
use App\Http\Controllers\SignUpIndukController;
use App\Http\Controllers\KategoriSampahController;
use App\Http\Controllers\LaporanPenguranganUnitController;
use App\Http\Controllers\LaporanPenjemputanSampahController;
use App\Http\Controllers\LaporanTransaksiNasabahController;
use App\Http\Controllers\PenguranganSampahUnitController;
use App\Http\Controllers\PenjemputanSampahUnitController;
use App\Http\Controllers\ProfileController;
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
Route::get('option', [AuthController::class, 'option'])->name('option');
Route::get('edukasi', [AuthController::class, 'edukasi'])->name('edukasi');
Route::post('loginAction', [AuthController::class, 'loginAction'])->name('loginAction');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
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
Route::resource('profile', ProfileController::class);

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
Route::resource('laporanTransaksiNasabah', LaporanTransaksiNasabahController::class);
Route::resource('laporanPenguranganUnit', LaporanPenguranganUnitController::class);
Route::resource('laporanPenjemputanSampah', LaporanPenjemputanSampahController::class);

//induk
Route::resource('penjemputanSampah', PenjemputanSampahController::class);
Route::resource('tarikTunaiUnit', TarikTunaiUnitController::class);
Route::resource('sampahTreatment', SampahTreatmentController::class);
Route::resource('konversiSampah', KonversiSampahController::class);
Route::resource('transaksiIndustri', TransaksiIndustriController::class);
Route::resource('laporanTransaksiIndustri', LaporanTransaksiIndustriController::class);

//industri
Route::resource('induk', IndukController::class);
Route::resource('sampahIndustri', SampahIndustriController::class);

//fbj
Route::resource('kelolaAkun', KelolaAkunController::class);
Route::resource('listUnit', ListUnitController::class);
Route::resource('listInduk', ListIndukController::class);
Route::resource('listIndustri', ListIndustriController::class);
Route::resource('listTransaksiNasabah', ListTransaksiNasabahController::class);
Route::resource('listTransaksiUnit', ListTransaksiUnitController::class);
Route::resource('listTransaksiInduk', ListTransaksiIndukController::class);
Route::resource('listRequestPendampingan', ListRequestPendampinganController::class);
Route::resource('informasi', InformasiController::class);
}); 
