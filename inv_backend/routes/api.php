<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\DetailPinjamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, "AuthLogin"]);

Route::controller(UserController::class)->group(function () {
    Route::get('/alluser', 'GetAllUser');
    Route::get('/user/{id}', 'UserById');
    Route::post('/adduser', 'RegisterUser');
    Route::post('/updateuser/{id}', 'UpdateUser');
    Route::delete('/deleteuser/{id}', 'DeleteUser');
});

Route::controller(PegawaiController::class)->group(function () {
    Route::get('/allpegawai', 'GetAllPegawai');
    Route::get('/pegawai/{id}', 'PegawaiById');
    Route::post('/addpegawai', 'AddPegawai');
    Route::post('/updatepegawai/{id}', 'UpdatePegawai');
    Route::delete('/deletepegawai/{id}', 'DeletePegawai');
});

Route::controller(PeminjamanController::class)->group(function () {
    Route::get('/allpeminjaman', 'GetAllPeminjaman');
    Route::post('/addpeminjaman', 'AddPeminjaman');
    Route::post('/updatepeminjaman/{id}', 'UpdatePeminjaman');
    Route::delete('/deletepeminjaman/{id}', 'DeletePeminjaman');
});

Route::controller(RuangController::class)->group(function () {
    Route::get('/allruang', 'GetAllRuang');
    Route::get('/ruang/{id}', 'RuangById');
    Route::post('/addruang', 'AddRuang');
    Route::post('/updateruang/{id}', 'UpdateRuang');
    Route::delete('/deleteruang/{id}', 'DeleteRuang');
});

Route::controller(InventarisController::class)->group(function () {
    Route::get('/allinventaris', 'GetAllInventaris');
    Route::post('/addinventaris', 'AddInventaris');
    Route::post('/updateinventaris/{id}', 'UpdateInventaris');
    Route::delete('/deleteinventaris/{id}', 'DeleteInventaris');
});

Route::controller(DetailPinjamController::class)->group(function () {
    Route::get('/alldetailpinjam', 'GetAllDetailPinjam');
    Route::post('/adddetailpinjam', 'AddDetailPinjam');
    Route::post('/updatedetailpinjam/{id}', 'UpdateDetailPinjam');
    Route::delete('/deletedetailpinjam/{id}', 'DeleteDetailPinjam');
});
