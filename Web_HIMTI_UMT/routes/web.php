<?php

use App\Http\Controllers\acaraController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\anggotaController;
use App\Http\Controllers\angkatanController;
use App\Http\Controllers\artikelController;
use App\Http\Controllers\contentController;
use App\Http\Controllers\jadwalSharingController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\tambahAngkatanController;
use App\Http\Controllers\tambahKategoriController;

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


Route::resource('/acara', acaraController::class)->middleware('auth');
Route::resource('/artikel', artikelController::class)->middleware('auth');
Route::resource('/jadwal-sharing', jadwalSharingController::class)->middleware('auth');
Route::resource('/anggota', anggotaController::class)->middleware('auth');
Route::resource('/angkatan',tambahAngkatanController::class)->middleware('auth');
Route::resource('/kategori', tambahKategoriController::class)->middleware('auth');



Route::get('/dashboard', [dashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');


Route::get('/login', [loginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/log', [loginController::class, 'log'])->name('log');
Route::post('/logout', [loginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [registerController::class, 'register'])->name('register')->middleware('guest');
Route::post('/regist', [registerController::class, 'regist'])->name('regist');




Route::get('/', [contentController::class, 'home'])->name('home');
Route::get('himti-umt/tentang', [contentController::class, 'tentang'])->name('tentang');
Route::get('/himti-umt/sharing', [contentController::class, 'sharing'])->name('sharing');
Route::get('/himti-umt/tutorial', [contentController::class, 'tutorial'])->name('tutorial');
Route::get('/himti-umt/agenda', [contentController::class, 'agenda'])->name('agenda');
Route::get('/himti-umt/artikel', [contentController::class, 'artikel'])->name('artikel');
Route::get('/himti-umt/klinik', [contentController::class, 'klinik'])->name('klinik');
Route::get('/himti-umt/detail-agenda/{agenda}', [contentController::class, 'detailAgenda'])->name('detailAgenda');
Route::get('/himti-umt/detail-artikel/{artikel}', [contentController::class, 'detailArtikel'])->name('detailArtikel');


