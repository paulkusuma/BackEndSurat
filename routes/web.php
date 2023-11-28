<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GDriveController;
use App\Http\Controllers\QrCodeController;
use Yaza\LaravelGoogleDriveStorage\Gdrive;

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
    return view('welcome');
});

Route::get('upload', [GDriveController::class, 'upload']);
Route::get('get-file', [GDriveController::class, 'getFile']);

Route::controller(QrCodeController::class)->group(function () {
    Route::get('qrcode', 'qrindex');
});

// Route::get('/qrcode', function () {
//     $data = Gdrive::get('assets/file.jpg');
//     $url = $data->file; // URL yang ingin Anda kirim ke view
//     return view('qrcode', ['url' => $url]); // Mengirim $url ke view
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
