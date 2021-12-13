<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

Route::match(['get', 'post'], '/register', function () {
    return redirect('login');
});

Route::get('/', [App\Http\Controllers\LandingController::class, 'portal'])->name('portal');
Route::get('/read-artikel/{id}', [App\Http\Controllers\LandingController::class, 'read'])->name('read');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//User route
Route::resource('/profile', UserController::class)->middleware('auth');
Route::get('/tableuser', [App\Http\Controllers\UserController::class, 'tableuser'])->name('tableuser')->middleware('auth');
Route::delete('/del-user/{id}', [App\Http\Controllers\UserController::class, 'delUser'])->name('deluser')->middleware('auth');
//Changepassword route
Route::put('/update-pass', [App\Http\Controllers\Auth\ChangePasswordController::class, 'updatePass'])->name('updatePass')->middleware('auth');
//Kelas route
Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index'])->name('kelas.index')->middleware('auth');
Route::post('/add-kelas', [App\Http\Controllers\KelasController::class, 'addKelas'])->name('kelas.add')->middleware('auth');
Route::put('/edit-kelas/{id}', [App\Http\Controllers\KelasController::class, 'editKelas'])->name('kelas.edit')->middleware('auth');
Route::delete('/del-kelas/{id}', [App\Http\Controllers\KelasController::class, 'delKelas'])->name('kelas.destroy')->middleware('auth');
//Halaqoh Route
Route::get('/halaqoh', [App\Http\Controllers\HalaqohController::class, 'index'])->name('halaqoh.index')->middleware('auth');
Route::post('/add-halaqoh', [App\Http\Controllers\HalaqohController::class, 'addHalaqoh'])->name('halaqoh.add')->middleware('auth');
Route::put('/edit-halaqoh/{id}', [App\Http\Controllers\HalaqohController::class, 'editHalaqoh'])->name('halaqoh.edit')->middleware('auth');
Route::delete('/del-halaqoh/{id}', [App\Http\Controllers\HalaqohController::class, 'delHalaqoh'])->name('halaqoh.destroy')->middleware('auth');
//Siswa Route
Route::resource('/siswa', SiswaController::class);
//hafalan baru route
Route::post('/add-hafalanbaru', [App\Http\Controllers\SiswaController::class, 'addHafalan'])->name('hafalanbaru.add')->middleware('auth');
Route::put('/edit-hafalanbaru/{id}', [App\Http\Controllers\SiswaController::class, 'editHafalan'])->name('hafalanbaru.edit')->middleware('auth');
Route::delete('/del-hafalanbaru/{id}', [App\Http\Controllers\SiswaController::class, 'delHafalan'])->name('hafalanbaru.destroy')->middleware('auth');
//
Route::get('/data-hafalan/{id}', [App\Http\Controllers\SiswaController::class, 'dataHafalan'])->name('datahafalan')->middleware('auth');
//
//Murajaah route
Route::post('/add-murajaah', [App\Http\Controllers\SiswaController::class, 'addMurajaah'])->name('murajaah.add')->middleware('auth');
Route::put('/edit-murajaah/{id}', [App\Http\Controllers\SiswaController::class, 'editMurajaah'])->name('murajaah.edit')->middleware('auth');
Route::delete('/del-murajaah/{id}', [App\Http\Controllers\SiswaController::class, 'delMurajaah'])->name('murajaah.destroy')->middleware('auth');
// landing route
Route::get('/dashboard', [App\Http\Controllers\LandingController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/per-kelas/{id}', [\App\Http\Controllers\LandingController::class, 'perKelas'])->name('landing.kelas')->middleware('auth');
Route::get('/per-halaqoh/{slug}', [\App\Http\Controllers\LandingController::class, 'perHalaqoh'])->name('landing.halaqoh')->middleware('auth');
Route::get('/per-data-hafalan/{slug}', [\App\Http\Controllers\LandingController::class, 'perData'])->name('landing.data')->middleware('auth');
Route::get('/search-siswa', [\App\Http\Controllers\LandingController::class, 'searchSiswa'])->name('search.siswa')->middleware('auth');
// grafik route
Route::get('/grafik/{slug}', [App\Http\Controllers\LandingController::class, 'chart'])->name('chart')->middleware('auth');
// sertifikasi route
Route::get('/sertifikasi', [App\Http\Controllers\LandingController::class, 'sertif'])->name('sertif')->middleware('auth');
Route::get('/sertifikat/{id}', [App\Http\Controllers\LandingController::class, 'sertifikat'])->name('sertifikat')->middleware('auth');
// Berita route
Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index')->middleware('auth');
Route::get('/show-berita/{id}', [App\Http\Controllers\BeritaController::class, 'show'])->name('berita.show')->middleware('auth');
Route::get('/make-berita', [App\Http\Controllers\BeritaController::class, 'makeBerita'])->name('berita.make')->middleware('auth');
Route::post('/add-berita', [App\Http\Controllers\BeritaController::class, 'addBerita'])->name('berita.add')->middleware('auth');
Route::get('/edit-berita/{id}', [App\Http\Controllers\BeritaController::class, 'editBerita'])->name('berita.edit')->middleware('auth');
Route::put('/edit-berita/{id}', [App\Http\Controllers\BeritaController::class, 'updateBerita'])->name('berita.update')->middleware('auth');
Route::delete('/del-berita/{id}', [App\Http\Controllers\BeritaController::class, 'delBerita'])->name('berita.destroy')->middleware('auth');
//Contact route
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
Route::post('/make-contact', [App\Http\Controllers\ContactController::class, 'makeContact'])->name('contact.make');
Route::get('/show-contact/{id}', [App\Http\Controllers\ContactController::class, 'showContact'])->name('contact.show');
Route::get('/list-contact', [App\Http\Controllers\ContactController::class, 'listContact'])->name('contact.list');
Route::delete('/del-contact/{id}', [App\Http\Controllers\ContactController::class, 'delContact'])->name('contact.destroy');