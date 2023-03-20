<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{loginController, registerController, editPasswordController, profileController};
use App\Http\Controllers\Admin\{acaraController, anggotaController, artikelController, dosenController, jadwalSharingController, strukturalController, tambahAngkatanController, tambahKategoriController, dashboardController, sertifikatAdminController, alumniController, adminController, kelompokBelajarController, partnershipController, tutorialController};
use App\Http\Controllers\Home\{contentController};
use App\Http\Controllers\Pendaftaran\{pendaftaranController};
use App\Http\Controllers\Setting\{footerController, sliderController};
use App\Http\Controllers\Danus\{danusSliderController, merchandiseController};


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


// Route::middleware(['auth'])->group(function () {
// });

Route::middleware(['guest'])->group(function () {
    //login
    Route::post('/log', [loginController::class, 'log'])->name('log');
    Route::get('/login', [loginController::class, 'login'])->name('login');

    //register
    Route::get('/register', [registerController::class, 'index'])->name('register');
    Route::post('/register', [registerController::class, 'store'])->name('register.store');

    //home
    Route::get('/', [contentController::class, 'home'])->name('home');
    //about
    Route::get('himti-umt/tentang', [contentController::class, 'tentang'])->name('tentang');
    //dosen
    Route::get('himti-umt/dosen', [contentController::class, 'dosen'])->name('dosen');
    Route::get('himti-umt/cari', [contentController::class, 'cari'])->name('cari');
    //sharing
    Route::get('/himti-umt/sharing', [contentController::class, 'sharing'])->name('sharing');
    //tutorial
    Route::get('/himti-umt/tutorial', [contentController::class, 'tutorial'])->name('tutorial');
    //agenda
    Route::get('/himti-umt/agenda', [contentController::class, 'agenda'])->name('agenda');
    //artikel
    Route::get('/himti-umt/artikel', [contentController::class, 'artikel'])->name('artikel');
    //klinik
    Route::get('/himti-umt/klinik', [contentController::class, 'klinik'])->name('klinik');
    //detail agenda
    Route::get('/himti-umt/detail-agenda/{agenda}', [contentController::class, 'detailAgenda'])->name('detailAgenda');
    //detail artikel
    Route::get('/himti-umt/detail-artikel/{artikel}', [contentController::class, 'detailArtikel'])->name('detailArtikel');
    //footer
    Route::get('/footer', [contentController::class, 'footer'])->name('footer');


    //pendaftaran
    // Kelompok Belajar
    Route::get('/pendaftaran-kelompok-belajar', [pendaftaranController::class, 'create'])->name('kelompok_belajar.create');
    Route::post('/kelompok-belajar', [pendaftaranController::class, 'store'])->name('kelompok_belajar.store');
    Route::get('/pendaftaran/sukses/{id}', [pendaftaranController::class, 'suksesKelompokBelajar'])->name('kb-sukses');
    // akhir pendaftaran
});





Route::group(['middleware' => 'auth', 'PreventBackHistory'], function () {

    //admin dashboard
    Route::get('/dashboard', [dashboardController::class, 'dashboard'])->name('dashboard');
    //logout
    Route::post('/logout', [loginController::class, 'logout'])->name('logout');
    // update profile
    Route::get('/profile', [profileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{profile}/edit', [profileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{profile}', [profileController::class, 'update'])->name('profile.update');
    Route::get('/password/{password}/edit', [editPasswordController::class, 'edit'])->name('password.edit');
    Route::patch('/password/{password}', [editPasswordController::class, 'update'])->name('password.update');
    // middleware
    Route::group(['middleware' => 'adminsuper'], function () {
        //acara
        Route::resource('/acara', acaraController::class);

        //artikel
        Route::resource('/artikel', artikelController::class);

        //jadwal sharing
        Route::resource('/jadwal-sharing', jadwalSharingController::class);

        //anggota
        Route::resource('/anggota', anggotaController::class);
        Route::get('/cari-anggota', [anggotaController::class, 'cari'])->name('cari-anggota');
        //cetak PDF
        Route::get('/data-anggota-pdf', [anggotaController::class, 'pdf'])->name('anggota.pdf');
        //cetak Excel
        Route::get('/data-anggota-excel', [anggotaController::class, 'excel'])->name('anggota.excel');

        //angkatan
        Route::resource('/angkatan', tambahAngkatanController::class);

        //kategori
        Route::resource('/kategori', tambahKategoriController::class);
        //cetak PDF
        Route::get('/download-pdf', [tambahKategoriController::class, 'pdf'])->name('kategori.pdf');
        //cetak Excel
        Route::get('/download-excel', [tambahKategoriController::class, 'excel'])->name('kategori.excel');

        //dosen
        Route::resource('/dosen', dosenController::class);
        // searvh
        Route::get('/cari-dosen', [dosenController::class, 'cari'])->name('cari-dosen');
        // import dosen
        Route::get('/import-dosen', [dosenController::class, 'importdosen'])->name('import-dosen');
        Route::get('/import-data-dosen', [dosenController::class, 'datadosen'])->name('import-data.dosen');
        //cetak PDF
        Route::get('/data-dosen-pdf', [dosenController::class, 'pdf'])->name('dosen.pdf');
        //cetak Excel
        Route::get('/data-dosen-excel', [dosenController::class, 'excel'])->name('dosen.excel');

        //about
        Route::resource('/struktural', strukturalController::class);

        // alumni
        Route::resource('/alumni', alumniController::class);
        Route::get('/cari-alumni', [alumniController::class, 'cari'])->name('cari-alumni');

        // footer
        Route::resource('/footer', footerController::class);

        // slider
        Route::resource('/slider', sliderController::class);

        // sertifikat
        Route::get('/sertifikat', [sertifikatAdminController::class, 'index'])->name('sertifikat.index');
        Route::get('/sertifikat/create', [sertifikatAdminController::class, 'create'])->name('sertifikat.create');
        Route::post('/sertifikat', [sertifikatAdminController::class, 'store'])->name('sertifikat.store');
        Route::patch('/sertifikat/{sertifikat}', [sertifikatAdminController::class, 'update'])->name('sertifikat.update');
        Route::delete('/sertifikat/{sertifikat}', [sertifikatAdminController::class, 'destroy'])->name('sertifikat.destroy');
        Route::get('/sertifikat/{sertifikat}/edit', [sertifikatAdminController::class, 'edit'])->name('sertifikat.edit');
        Route::get('/sertifikat/{sertifikat}', [sertifikatAdminController::class, 'show'])->name('sertifikat.show');
        // Route::resource('/sertifikat', sertifikatAdminController::class);
        // akhir sertifikat
        // kelompok belajar
        Route::resource('/kelompokbelajar', kelompokBelajarController::class);
        //cetak PDF
        Route::get('/data-kelompok-belajar-pdf', [kelompokBelajarController::class, 'pdf'])->name('kelompokbelajar.pdf');
        //cetak Excel
        Route::get('/data-kelompok-belajar-excel', [kelompokBelajarController::class, 'excel'])->name('kelompokbelajar.excel');

        // admin
        Route::resource('/admin', adminController::class);

        // partnership
        Route::resource('/partnership', partnershipController::class);

        // Tutorial
        Route::resource('/tutorial', tutorialController::class);

        //danus
        Route::resource('/danus-slider', danusSliderController::class);
        Route::resource('/danus-merchandise', merchandiseController::class);
    });

    Route::group(['middleware' => 'admin'], function () {
    });

    Route::group(['middleware' => 'user'], function () {
        //danus
        Route::resource('/danus-slider', danusSliderController::class);
        Route::resource('/danus-merchandise', merchandiseController::class);
    });
});



Route::get('/sertifikat-pdf-download/{id}', [sertifikatAdminController::class, 'pdf'])->name('sertif-download');
