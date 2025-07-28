<?php

use Illuminate\Support\Facades\Route;
use Base33\BossOnboarding\Http\Controllers\TenantRegistrationController;

Route::middleware('web')->group(function () {
    Route::get('/register-tenant', [TenantRegistrationController::class, 'create'])->name('tenant.register.create');
    Route::post('/register-tenant', [TenantRegistrationController::class, 'store'])->name('tenant.register.store');
    Route::get('/register-tenant/success', [TenantRegistrationController::class, 'success'])->name('tenant.register.success');
});
