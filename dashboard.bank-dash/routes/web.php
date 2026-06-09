<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PageController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [HomeController::class, 'view'])->name('overview');
    Route::get('/transactions', [PageController::class, 'transactionView'])->name('transactions');
    Route::get('/accounts', [PageController::class, 'accountView'])->name('accounts');
    Route::get('/investments', [PageController::class, 'investmentView'])->name('investments');
    Route::get('/cards', [PageController::class, 'creditcardView'])->name('credit cards');
    Route::get('/loans', [PageController::class, 'loanView'])->name('loans');
    Route::get('/services', [PageController::class, 'serviceView'])->name('services');
    Route::get('/privileges', [PageController::class, 'privilegeView'])->name('privileges');
    Route::get('/settings', [PageController::class, 'settingView'])->name('settings');
    Route::get('deauthenticate', [AuthController::class, 'deauthenticate'])->name('deauthenticate');
});
Route::middleware(['web', 'guest'])->group(function () {
    Route::get('login', function () {
        return Inertia::render('auth/Login');
    })->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate']);
});
