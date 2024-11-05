<?php

use App\Http\Controllers\PegawaiDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('pegawai', PegawaiDashboardController::class)->names([
    'index' => 'pegawai',
    'create' => 'pegawai.create',
    'store' => 'pegawai.store',
    'show' => 'pegawai.show',
    'edit' => 'pegawai.edit',
    'update' => 'pegawai.update',
    'destroy' => 'pegawai.destroy',
]);

Route::get('/', [PegawaiDashboardController::class, 'dashboard'])->name('dashboard');
