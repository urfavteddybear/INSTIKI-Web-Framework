<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\NamaController;
use GuzzleHttp\Psr7\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/test1/{nama?}', function ($nama = "Kosong") {
//     return "Nama saya adalah " . $nama;
// });

// Route::get('/test1/{nama?}', function ($nama = "Kosong") {
//     return "Nama saya adalah " . $nama;
// })->where('nama', '[A-Za-z]+');


// Route::get('/dkkdasldplaspdlaspdlpsa', function () {
//     return "Testing";
// })->name('testing');

// Route::get('/test', function () {
//     return view('test');
// });

// Route::get('/nama/{nama}', [NamaController::class, 'nama'])->name('nama');
// Route::get('/hitung/{angka1}/{angka2}', [NamaController::class, 'hitung'])->name('hitung');

// Route::get('/calculator', [CalculatorController::class, 'index']);
// Route::post('/calculate', [CalculatorController::class, 'calculate']);
// // Route::get('/calc', [CalculatorController::class, 'tambah'])->name('nama');

// Route::get('/calc', function () {
//     return view('pages.kalkulator');
// });
// Route::get('/testing', function () {
//     return view('pages.testing');
// });

Route::get('/', function () {
    return redirect()->route('barang.index');
});
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/edit/{barang_id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/update/{barang_id}', [BarangController::class, 'update'])->name('barang.update');
Route::get('/barang/show/{barang_id}', [BarangController::class, 'show'])->name('barang.show');
Route::delete('/barang/destroy/{barang_id}', [BarangController::class, 'destroy'])->name('barang.destroy');
