<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\admin\AcaraaController;
use App\Http\Controllers\admin\HomeaController;
use App\Http\Controllers\admin\TicketaController;
use App\Http\Controllers\superadmin\UserController;
use App\Http\Controllers\superadmin\HomesController;
use App\Http\Controllers\superadmin\AcarasController;
use App\Http\Controllers\superadmin\ComentsController;
use App\Http\Controllers\superadmin\OrdersController;
use App\Http\Controllers\superadmin\VenuesController;
use App\Http\Controllers\superadmin\TicketsController;

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

Route::get('/', [AcaraController::class, 'index']);
Route::get('/about', [AcaraController::class, 'about']);
Route::get('/acara/{id}', [AcaraController::class, 'show']);
Route::post('/pesan/{id}', [OrderController::class, 'orders']);
Route::get('/tikets/{id}', [AcaraController::class, 'tikets']);
Route::get('/search', [AcaraController::class, 'search']);
Route::get('/contact', [AcaraController::class, 'contact']);
// Route::post('/pesan/{id}', [TiketController::class, 'orders']);
Auth::routes();

//ini adalah route user
Route::get('/home', [HomeController::class, 'user'])->name('home');
Route::get('/pesanans', [OrderController::class, 'transaksi'])->name('pesanans');
Route::get('/pesanan/detail/{id}', [OrderController::class, 'transaksis'])->name('pesanan');
Route::put('/bayar/{id}', [OrderController::class, 'bayar']);
Route::get('/exportpdf/{id}', [OrderController::class, 'exportpdf'])->name('exportpdf');
Route::post('/kirim', [ComentController::class, 'kirim']);

// ini adalah route superadmin
// Route::get('superadmin/home', [HomesController::class, 'superadmin'])->name('superadmin.home')->middleware('is_superadmin');
// Route::get('superadmin/user', [UserController::class, 'indexuser']);
// Route::get('superadmin/admin', [UserController::class, 'indexadmin']);
// Route::post('superadmin/simpan', [UserController::class, 'adminstore']);

Route::prefix('superadmin')->namespace('superadmin')->middleware('is_superadmin')->group(function(){
    Route::get('home', [HomesController::class, 'index'])->name('superadmin.home');

    // penanganan user
    Route::get('user', [UserController::class, 'indexuser']);
    Route::get('admin', [UserController::class, 'indexadmin']);
    Route::post('simpan', [UserController::class, 'store']);
    Route::get('edit/{id}', [UserController::class, 'edit']);
    Route::put('update/{id}', [UserController::class, 'update']);
    Route::get('hapus/{id}', [UserController::class, 'hapus']);

    // penanganan konten
        //acara
        Route::get('acara', [AcarasController::class, 'index']);
        Route::get('allacara', [AcarasController::class, 'allacara']);
        Route::post('addacara', [AcarasController::class, 'addacara']);
        Route::get('acara/edit/{id}', [AcarasController::class, 'editacara']);
        Route::put('acara/update/{id}', [AcarasController::class, 'updateacara']);
        Route::get('dellacara/{id}', [AcarasController::class, 'dellacara']);
        // venue
        Route::get('venue', [VenuesController::class, 'index']);
        Route::post('addvenue', [VenuesController::class, 'addvenue']);
        Route::get('venue/edit/{id}', [VenuesController::class, 'editvenue']);
        Route::put('venue/update/{id}', [VenuesController::class, 'updatevenue']);
        Route::get('dellvenue/{id}', [VenuesController::class, 'dellvenue']);
        // tiket
        Route::get('tiket', [TicketsController::class, 'index']);
        Route::get('alltiket', [TicketsController::class, 'alltiket']);
        Route::post('addtiket', [TicketsController::class, 'addtikets']);
        Route::get('tiket/edit/{id}', [TicketsController::class, 'edittiket']);
        Route::put('tiket/update/{id}', [TicketsController::class, 'updatetiket']);
        Route::get('delltiket/{id}', [TicketsController::class, 'delltiket']);
        Route::get('transaksi', [OrdersController::class, 'transaksi']);
        Route::get('dellorder/{id}', [OrdersController::class, 'delete']);
        Route::get('konfirmasi/{id}', [OrdersController::class, 'confirm']);
        // coment
        Route::get('contact', [ComentsController::class, 'index']);
        Route::get('hapuscom/{id}', [ComentsController::class, 'hapus']);
});

// ini adalah route admin
// Route::get('admin/home', [HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');
Route::prefix('admin')->namespace('admin')->middleware('is_admin')->group(function(){
    Route::get('home', [HomeaController::class, 'index'])->name('admin.home');
    // penanganan acara
    Route::get('acaraa', [AcaraaController::class, 'index'])->name('admin.acara');
    Route::post('addacaraa', [AcaraaController::class, 'store']);
    Route::get('acaraa/edit/{id}', [AcaraaController::class, 'edit']);
    Route::put('acaraa/update/{id}', [AcaraaController::class, 'update']);
    Route::get('dellacara/{id}', [AcaraaController::class, 'destroy']);
    // penanganan tiket
    Route::get('tiketa', [TicketaController::class, 'index'])->name('admin.tiket');
    Route::post('addtiketa', [TicketaController::class, 'store']);
    Route::get('tiketa/edit/{id}', [TicketaController::class, 'edit']);
    Route::put('tiketa/update/{id}', [TicketaController::class, 'update']);
    Route::get('delltiket/{id}', [TicketaController::class, 'destroy']);
});