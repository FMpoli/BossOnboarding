<?php

use Base33\BossOnboarding\Http\Controllers\TenantRegistrationController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    // Tenant Registration Routes (only for central app)
    Route::get('/register', [TenantRegistrationController::class, 'create'])->name('register.tenant');
    Route::post('/register-tenant', [TenantRegistrationController::class, 'store'])->name('tenant.register.store');
    Route::get('/register/success', [TenantRegistrationController::class, 'success'])->name('register.success');
});
