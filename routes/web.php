<?php

use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UlasanController;
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
    return view('clients.home.client-index');
})->name('beranda');

Route::get('/isi-freon', [LayananController::class,'isi_freon'])->name('layanan.isi-freon');
Route::get('/service-ac', [LayananController::class,''])->name('layanan.service-ac');
Route::get('/cuci-ac', function () {
    return view('clients.home.client-index');
})->name('layanan.cuci-ac');
Route::get('/cuci-besar-ac', function () {
    return view('clients.home.client-index');
})->name('layanan.cuci-besar-ac');
Route::get('/bongkar-pasang-ac', function () {
    return view('clients.home.client-index');
})->name('layanan.bongkar-pasang-ac');

Route::post('/buat_transaksi',[TransaksiController::class,'buat_transaksi'])->name('buat_transaksi');
Route::get('/pembayaran/{id}',[TransaksiController::class,'pembayaran'])->name('pembayaran');
Route::post('/lengkapi-pembayaran/{id}',[TransaksiController::class,'lengkapiPembayaran'])->name('lengkapi-pembayaran');
Route::get('/lengkapi-pembayaran/{id}/bukti-pembayaran',[TransaksiController::class,'uploadBuktiPembayaran'])->name('bukti-pembayaran');
Route::post('/lengkapi-pembayaran/{id}/upload',[TransaksiController::class,'storeBuktiPembayaran'])->name('storeBuktiPembayaran');

Route::get('/pengaturan-akun',[DashboardUserController::class,'pengaturan_akun'])->name('user.pengaturan-akun');
Route::get('/transaksi',[DashboardUserController::class,'transaksi_user'])->name('user.transaksi-user');
Route::get('/detail-transaksi/{id}',[DashboardUserController::class,'detailTransaksi'])->name('user.detailTransaksi-user');

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.dashboard-index');
    })->name('dashboard');
    Route::get('layanan', [DaftarLayananController::class,'index'])->name('daftar_layanan');

    Route::get('daftar-transaksi',[DashboardAdminController::class,'daftarTransaksi'])->name('admin.daftarTransaksi');
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
