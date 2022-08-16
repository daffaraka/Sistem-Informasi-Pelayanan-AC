<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UserController;
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

Route::get('/',[ClientController::class,'index'])->name('beranda');
Route::get('/pilih-layanan/{id}',[ClientController::class,'pilihLayanan'])->name('pilihLayanan');
// 

Route::post('/buat_transaksi',[TransaksiController::class,'buat_transaksi'])->name('buat_transaksi');
Route::get('/pembayaran/{id}',[TransaksiController::class,'pembayaran'])->name('pembayaran');
Route::post('/lengkapi-pembayaran/{id}',[TransaksiController::class,'pilih_metode'])->name('pilih_metode');
Route::get('/lengkapi-pembayaran/{id}/bukti-pembayaran',[TransaksiController::class,'uploadBuktiPembayaran'])->name('upload-pembayaran');
Route::post('/lengkapi-pembayaran/{id}/upload',[TransaksiController::class,'storeBuktiPembayaran'])->name('storeBuktiPembayaran');

Route::get('/pengaturan-akun',[DashboardUserController::class,'pengaturan_akun'])->name('user.pengaturan-akun');
Route::get('/transaksi',[DashboardUserController::class,'transaksi_user'])->name('user.transaksi-user');
Route::get('/detail-transaksi/{id}',[DashboardUserController::class,'detailTransaksi'])->name('user.detailTransaksi-user');

// Review
Route::get('/review/{id}',[ReviewController::class,'buatReview'])->name('buat-review');
Route::post('/review/{id}',[ReviewController::class,'store'])->name('upload-review');

Route::prefix('dashboard')->middleware(['auth','role:Admin'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.dashboard-index');
    })->name('dashboard');
    Route::get('layanan', [LayananController::class,'index'])->name('layanan');
    Route::get('layanan/create', [LayananController::class,'create'])->name('layanan.create');
    Route::post('layanan/store', [LayananController::class,'store'])->name('layanan.store');
    Route::get('layanan/edit/{id}', [LayananController::class,'edit'])->name('layanan.edit');
    Route::post('layanan/update/{id}', [LayananController::class,'update'])->name('layanan.update');
    Route::get('layanan/show/{id}', [LayananController::class,'show'])->name('layanan.show');
    Route::get('layanan/delete/{id}', [LayananController::class,'destroy'])->name('layanan.delete');

    Route::get('daftar-transaksi',[DashboardAdminController::class,'daftarTransaksi'])->name('admin.daftarTransaksi');
    Route::get('daftar-transaksi/detail/{id}',[DashboardAdminController::class,'detailTransaksi'])->name('admin.detailTransaksi');
    Route::get('daftar-transaksi/detail/{id}',[DashboardAdminController::class,'detailTransaksi'])->name('admin.detailTransaksi');
    Route::get('daftar-transaksi/detail/{id}/tolak',[DashboardAdminController::class,'tolakTransaksi'])->name('admin.tolakTransaksi');
    Route::get('daftar-transaksi/detail/{id}/terima',[DashboardAdminController::class,'terimaTransaksi'])->name('admin.terimaTransaksi');



    Route::get('ulasan',[UlasanController::class,'index'])->name('ulasan');
    // Route::get('riwayat-pemesanan',[]);

    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Route::get('user/index', [UserController::class,'index'])->name('user.index');

    Route::get('role', [RoleController::class, 'index'])->name('role.index');
    Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('role/update', [RoleController::class, 'update'])->name('role.update');
    Route::get('role/show/{id}', [RoleController::class, 'show'])->name('role.show');
    Route::get('role/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
});



require __DIR__.'/auth.php';
