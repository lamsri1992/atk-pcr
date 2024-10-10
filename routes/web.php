<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('activity')->group(function (){
    Route::get('/', [ActivityController::class, 'index'])->middleware(['auth', 'verified'])->name('activity.index');
    Route::get('/create', [ActivityController::class, 'create'])->middleware(['auth', 'verified'])->name('activity.create');
    Route::post('/store', [ActivityController::class, 'store'])->middleware(['auth', 'verified'])->name('activity.store');
    Route::post('/queupdate', [ActivityController::class, 'queupdate'])->middleware(['auth', 'verified'])->name('activity.queupdate');
    Route::get('/que', function () {
        return view('activity.que');
    });

    Route::get('/destroy/{id}', [ActivityController::class, 'destroy'])->middleware(['auth', 'verified'])->name('activity.destroy');
    Route::get('/view/{id}', [ActivityController::class, 'show'])->middleware(['auth', 'verified'])->name('activity.show');
    Route::post('/update/{id}', [ActivityController::class, 'update'])->middleware(['auth', 'verified'])->name('activity.update');
    Route::get('/register/{id}', [ActivityController::class, 'register'])->middleware(['auth', 'verified'])->name('activity.register');
    Route::get('/rprint/{id}', [ActivityController::class, 'rprint'])->middleware(['auth', 'verified'])->name('activity.rprint');
});

Route::prefix('regist')->group(function (){
    Route::get('/', [RegisterController::class, 'index'])->middleware(['auth', 'verified'])->name('register.index');
    Route::get('/create', [RegisterController::class, 'create'])->middleware(['auth', 'verified'])->name('register.create');
    // Route::get('/exam', [RegisterController::class, 'exam'])->name('register.exam');
    Route::post('/store', [RegisterController::class, 'store'])->middleware(['auth', 'verified'])->name('register.store');
    Route::get('/destroy/{id}', [RegisterController::class, 'destroy'])->middleware(['auth', 'verified'])->name('register.destroy');
    Route::get('/view/{id}', [RegisterController::class, 'show'])->middleware(['auth', 'verified'])->name('register.show');
    Route::get('/showexam/{id}', [RegisterController::class, 'showexam'])->middleware(['auth', 'verified'])->name('register.showexam');
    Route::post('/update/{id}', [RegisterController::class, 'update'])->middleware(['auth', 'verified'])->name('register.update');
})->middleware(['auth', 'verified']);

Route::prefix('frontend')->group(function (){
    // Route::get('/', [FrontendController::class, 'index'])->name('register.index');
    Route::get('/create/{id}', [FrontendController::class, 'create'])->name('frontend.create');
    Route::post('/store/{id}', [FrontendController::class, 'store'])->name('frontend.store');
    Route::get('/success', function () {
        return view('frontend.success');
    });
    // Route::get('/view/{id}', [FrontendController::class, 'show'])->name('register.show');
    // Route::get('/showexam/{id}', [FrontendController::class, 'showexam'])->name('register.showexam');
    // Route::post('/update/{id}', [FrontendController::class, 'update'])->name('register.update');
});

Route::prefix('user')->group(function (){
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    // Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/view/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/reset/{id}', [UserController::class, 'reset'])->name('user.reset');
});

require __DIR__.'/auth.php';
