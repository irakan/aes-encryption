<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DecryptController;
use App\Http\Controllers\EncryptController;
use App\Http\Controllers\PairKeysController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DecryptKeyController;
use App\Http\Controllers\EncryptKeyController;
use App\Http\Controllers\DecryptFileController;
use App\Http\Controllers\EncryptFileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DownloadPublicKeyController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');

    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('login');

    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {

    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');


    Route::get('pair-keys', [PairKeysController::class, 'index'])->name('pair-keys');
    Route::post('pair-keys', [PairKeysController::class, 'store'])->name('pair-keys');
    Route::post('download/public-key', DownloadPublicKeyController::class)->name('download.public-key');


    Route::get('encrypt', [EncryptController::class, 'show'])->name('encrypt');
    Route::post('encrypt-file', [EncryptFileController::class, 'store'])->name('encrypt-file');
    Route::post('encrypt-key', [EncryptKeyController::class, 'store'])->name('encrypt-key');


    Route::get('decrypt', [DecryptController::class, 'show'])->name('decrypt');
    Route::post('decrypt-file', [DecryptFileController::class, 'store'])->name('decrypt-file');
    Route::post('decrypt-key', [DecryptKeyController::class, 'store'])->name('decrypt-key');
});

Route::get('/', function () {
    return view('home');
})->name('home');
