<?php

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// odalar
Route::get('/odalar', [App\Http\Controllers\RoomController::class, 'index'])->name('odalar');
Route::post('/oda-ekle', [App\Http\Controllers\RoomController::class, 'ekle'])->name('odaekle');
Route::get('/oda-duzenle/{id}', [App\Http\Controllers\RoomController::class, 'duzenle'])->name('oda-duzenle');
Route::post('/odaupdate', [App\Http\Controllers\RoomController::class, 'odaupdate'])->name('odaupdate');

// rezervasyon
Route::get('/rezervasyon-yap', [App\Http\Controllers\RezervasyonController::class, 'rez_yap_index'])->name('rez_yap_index');
Route::post('/rezervasyon-sorgula', [App\Http\Controllers\RezervasyonController::class, 'rez_yap_sorgula'])->name('rez_yap_sorgula');
Route::get('/rezervasyonlarim', [App\Http\Controllers\RezervasyonController::class, 'rezervasyonlarim'])->name('rezervasyonlarim');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
