<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\KolektorController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\SadminController;
use App\Models\Product;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;


    // //untuk Akses admin
    // Route::middleware(['auth'])->group(function(){
    //     Route::get('/', [AuthController::class, 'login'])->name('users');
    // });

    Route::middleware(['redirectrt'])->group(function () {
        Route::get('/', [AuthController::class, 'login'])->name('users');
});


    Route::controller(AuthController::class)->group(function () {
        Route::get('register', 'register')->name('register');
        Route::post('register', 'registerSave')->name('register.save');
    
        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginAction')->name('login.action');
    
        Route::get('logout', 'logout')->middleware('auth')->name('logout');
    });
    
    // Route::middleware('oten')->group(function () {
    //     Route::get('bendahara/dashboard', function () {
    //         return view('bendahara.dashboard');
    //     })->name('dashboard');

    Route::middleware(['role:bendahara@gmail.com', 'oten'])->group(function () {
        Route::prefix('bendahara')->group(function () {
            Route::get('', [BendaharaController::class, 'index'])->name('bendahara');
            Route::get('bendahara/create', [BendaharaController::class, 'create'])->name('bendahara.create');
            Route::get('bendahara/{id}/show', [BendaharaController::class, 'show'])->name('bendahara.show');
            Route::get('bendahara/{id}edit/', [BendaharaController::class, 'edit'])->name('bendahara.edit');
            Route::patch('bendahara/{id}', [BendaharaController::class, 'update'])->name('bendahara.update');
            Route::post('bendahara/store', [BendaharaController::class, 'store'])->name('bendahara.store');
            Route::delete('bendahara/destroy/{id}/', [BendaharaController::class, 'destroy'])->name('bendahara.destroy');
            Route::get('bendahara/{id}/print', [BendaharaController::class, 'print'])->name('bendahara.print');
            Route::get('/bendaharas/bendahara/pdf/{id}', [BendaharaController::class, 'pdf'])->name('bendahara.pdf');
            Route::get('/search', [KolektorController::class, 'search'])->name('search');
            Route::get('/laporanbd', [BendaharaController::class, 'laporanbd'])->name('bendahara.laporanbd');
        });
    });
    Route::middleware('oten')->group(function () {
        Route::get('bendahara/dashboard', function () {
            return view('bendahara.dashboard');
        })->name('bendahara.dashboard');
    });

    Route::middleware(['role:kolektor@gmail.com', 'oten'])->group(function () {
        Route::prefix('kolektor')->group(function () {
            Route::get('', [KolektorController::class, 'index'])->name('kolektor');
                Route::get('kolektor/create', [KolektorController::class, 'create'])->name('kolektor.create');
                Route::get('kolektor/{id}/show', [KolektorController::class, 'show'])->name('kolektor.show');
                Route::get('kolektor/{id}edit/', [KolektorController::class, 'edit'])->name('kolektor.edit');
                Route::patch('kolektor/{id}', [KolektorController::class, 'update'])->name('kolektor.update');
                Route::post('kolektor/store', [KolektorController::class, 'store'])->name('kolektor.store');
                Route::delete('kolektor/destroy/{id}/', [KolektorController::class, 'destroy'])->name('kolektor.destroy');
                Route::get('/search', [KolektorController::class, 'search'])->name('search');
                Route::get('/chart', [KolektorController::class, 'dashboardkl'])->name('kolektor.dashboardkl');
        });
    });

    Route::middleware(['role:sadmin@gmail.com', 'oten'])->group(function () {
        Route::prefix('superadmin')->group(function () {
            Route::get('', [SadminController::class, 'index'])->name('sadmin');
                Route::get('sadmin/create', [SadminController::class, 'create'])->name('sadmin.create');
                Route::get('sadmin/{id}/show', [SadminController::class, 'show'])->name('sadmin.show');
                Route::get('sadmin/{id}edit/', [SadminController::class, 'edit'])->name('sadmin.edit');
                Route::patch('sadmin/{id}', [SadminController::class, 'update'])->name('sadmin.update');
                Route::post('sadmin/store', [SadminController::class, 'store'])->name('sadmin.store');
                Route::delete('sadmin/destroy/{id}/', [SadminController::class, 'destroy'])->name('sadmin.destroy');
                Route::get('/search', [SadminController::class, 'search'])->name('search');
                Route::get('/chart', [SadminController::class, 'dashboardkl'])->name('kolektor.dashboardkl');
        });
    });
