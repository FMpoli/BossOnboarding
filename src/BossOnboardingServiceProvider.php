<?php

namespace Base33\BossOnboarding;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Base33\BossOnboarding\Http\Livewire\RegisterTenant;
use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

class BossOnboardingServiceProvider extends PackageServiceProvider
{

    public function configurePackage(Package $package): void
    {
        $package
            ->name('bossonboarding')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoutes('web')
            ->hasMigration('create_bossonboarding_table');
    }

    public function boot(): void
    {
        parent::boot();

        // Register Livewire components
        Livewire::component('register-tenant', RegisterTenant::class);

        // Register tenant routes manually
        Route::middleware([
            'web',
            InitializeTenancyByDomain::class,
            PreventAccessFromCentralDomains::class,
        ])->group(function () {
            Route::get('/', function () {
                return view('bossonboarding::tenant-welcome');
            })->name('tenant.welcome');
        });
    }
}
