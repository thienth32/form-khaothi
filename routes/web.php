<?php

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

Route::redirect('/', '/login');
Route::get('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('redirect/google', [\App\Http\Controllers\AuthController::class, 'redirectGoogleAuth'])->name('login.google');
Route::get('auth/callback', [\App\Http\Controllers\AuthController::class, 'authCallback']);
Route::any('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function(){
    Route::get('form-bao-cao-thi', [\App\Http\Controllers\FormBaoCaoThiController::class, 'index'])->name('form.baocaothi');
    Route::post('form-bao-cao-thi', [\App\Http\Controllers\FormBaoCaoThiController::class, 'postBaoCaoThi']);

    Route::get('form-bao-cao-thanh-cong', [\App\Http\Controllers\FormBaoCaoThiController::class, 'thanhCong'])->name('form.thanhcong');

    Route::get('lich-su-bao-cao-thi', [\App\Http\Controllers\FormBaoCaoThiController::class, 'lichSuBaoCao'])->name('form.lichsu');
    Route::get('tai-file-bao-cao-thi/{luotbaocao}', [\App\Http\Controllers\FormBaoCaoThiController::class, 'taiFileBaocao'])->name('form.taifilebaocao');
});
