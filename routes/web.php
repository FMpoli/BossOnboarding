<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'ensure.tenant.exists'])->group(function () {
    // Tenant Welcome Route
    Route::get('/', function () {
        return view('bossonboarding::tenant-welcome');
    })->name('tenant.welcome');

    // Debug Route
    Route::get('/debug', function () {
        return view('bossonboarding::debug');
    })->name('debug');
});
