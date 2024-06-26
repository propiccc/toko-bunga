<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BungaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PemesananController;

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
Route::middleware('block')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/product/{uuid}/detail', [PemesananController::class,'detail'])->name('product.detail');
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('login.view')->middleware('guest');
    Route::get('/register', [AuthController::class, 'viewRegister'])->name('register.view')->middleware('guest');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
    
    Route::prefix('auth')->middleware('guest')->group(function(){
        Route::post('/login', [AuthController::class, 'login'])->name('login.store');
        Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    });
    
    Route::prefix('customer')->middleware(['isLogin','role:admin,customer'])->group(function () {
        Route::get('{uuid}/nota', [NotaController::class, 'cetakNota'])->name('cetak.nota');
        Route::get('/dashboard', [HomeController::class, 'dashboardCustomer'])->name('dashboard.customer');
        Route::post('{uuid}/set', [PemesananController::class, 'set'])->name('pemesanan.set');
        Route::get('{uuid}/product', [PemesananController::class, 'PemesananIndex'])->name('pemesanan.product');
        Route::post('{uuid}/detail', [PemesananController::class, 'PemesananDetail'])->name('pemesanan.detail');
    
        Route::prefix('payment')->group(function(){
            Route::get('/', [PaymentController::class, 'PaymentDetail'])->name('payment.detail');
        });
    });
    
    Route::prefix('dashboard')->middleware(['isLogin','role:admin'])->group(function(){
        Route::get('/',[HomeController::class, 'dashboard'])->name('dashboard.admin');
    
        Route::prefix('bunga')->group(function(){
            Route::get('/', [BungaController::class, 'index'])->name('bunga.index');
            Route::post('/search', [BungaController::class, 'search'])->name('bunga.search');
            Route::get('/create', [BungaController::class, 'create'])->name('bunga.create');
            Route::get('{uuid}/edit', [BungaController::class, 'edit'])->name('bunga.edit');
            Route::post('/store', [BungaController::class, 'store'])->name('bunga.store');
            Route::post('{uuid}/update', [BungaController::class, 'update'])->name('bunga.update');
            Route::get('{uuid}/delete', [BungaController::class, 'delete'])->name('bunga.delete');
        });
    
        Route::prefix('pemesanan')->group(function(){
            Route::get('/', [PemesananController::class, 'index'])->name('pemesanan.index');
            Route::get('{uuid}/success', [PemesananController::class, 'PemesananSuccess'])->name('pemesanan.success');
            
            Route::post('/search', [PemesananController::class, 'search'])->name('pemesanan.search');
            Route::get('/create', [PemesananController::class, 'create'])->name('pemesanan.create');
            Route::get('{uuid}/edit', [PemesananController::class, 'edit'])->name('pemesanan.edit');
            Route::post('/store', [PemesananController::class, 'store'])->name('pemesanan.store');
            Route::post('{uuid}/update', [PemesananController::class, 'update'])->name('pemesanan.update');
            Route::get('{uuid}/delete', [PemesananController::class, 'delete'])->name('pemesanan.delete');
        });
        
        Route::prefix('user')->group(function(){
            Route::post('/search', [UserController::class, 'search'])->name('user.search');
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::get('{uuid}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::post('/store', [UserController::class, 'store'])->name('user.store');
            Route::post('{uuid}/update', [UserController::class, 'update'])->name('user.update');
            Route::get('{uuid}/delete', [UserController::class, 'delete'])->name('user.delete');
        });
    });
});


