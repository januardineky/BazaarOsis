<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
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
    return view('landing');
});
Route::get('/', [UserController::class, 'landing']);
Route::post('/contact', [UserController::class, 'contact']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/auth/login',[UserController::class,'auth']);
Route::get('/register',[UserController::class,'register']);
// Route::get('/landing',[UserController::class,'landing']);
Route::post('/createuser',[UserController::class,'createuser']);
Route::middleware(['\App\Http\Middleware\StatusLogin::class'])->group(function () {
    Route::middleware(['\App\Http\Middleware\adminauth::class'])->group(function () {
        Route::get('/index',[ProdukController::class,'index']);
        Route::get('/index/kontak',[UserController::class,'kontak']);
        Route::get('/index/pelanggan',[UserController::class,'pelanggan']);
        Route::get('/index/pesanan',[UserController::class,'order']);
        Route::post('/index/findorder',[UserController::class,'findorder']);
        Route::get('/index/cart/delete/{id_user}',[UserController::class, 'hapusorder']);
        Route::get('/index/cart/update/{id_user}',[UserController::class, 'updateorder']);
        Route::post('/index/caripelanggan',[UserController::class,'caripelanggan']);
        Route::get('/index/create',[ProdukController::class,'create']);
        Route::get('/index/delete/{id}',[ProdukController::class,'delete']);
        Route::post('/index/create',[ProdukController::class,'input']);
        Route::get('/index/edit/{id}',[ProdukController::class,'edit']);
        Route::post('/index/edit/{id}',[ProdukController::class,'update']);
        Route::post('/index/search',[ProdukController::class,'search']);
        Route::get('/kategori', [CategoryController::class, 'index'])->name('home');
    });
    Route::get('/home',[ProdukController::class,'home']);
    Route::get('/home/cart',[ProdukController::class,'cart']);
    Route::get('/home/dikirim',[ProdukController::class,'shipped']);
    Route::post('/home/dikirim/abort',[ProdukController::class,'abort']);
    Route::get('/home/sampai',[ProdukController::class,'arrived']);
    Route::post('/home/tambah/{id}',[ProdukController::class,'tambah']);
    Route::get('/home/cart/delete/{id}',[ProdukController::class,'hapusproduk']);
    Route::post('/home/cart/tambah/{id}',[ProdukController::class,'editjumlah']);
    Route::post('/home/cart/pesan',[ProdukController::class,'pesan']);
    Route::post('/home/search',[ProdukController::class,'cari']);
    Route::get('/auth/logout',[UserController::class,'logout']);

});
