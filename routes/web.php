<?php

use Base33\BossOnboarding\Http\Controllers\AuthController;
use Base33\BossOnboarding\Http\Controllers\TenantRegistrationController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    // Authentication Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Password Reset Routes
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

    // Tenant Registration Routes
    Route::get('/register', [TenantRegistrationController::class, 'create'])->name('register.tenant');
    Route::post('/register-tenant', [TenantRegistrationController::class, 'store'])->name('tenant.register.store');
    Route::get('/register/success', [TenantRegistrationController::class, 'success'])->name('register.success');

    // Tenant Login Route
    Route::get('/', function () {
        return view('bossonboarding::login');
    })->name('tenant.login');

    // Debug Route
    Route::get('/debug', function () {
        return view('bossonboarding::debug');
    })->name('debug');
});
