<?php

namespace Base33\BossOnboarding;

use Base33\BossOnboarding\Http\Livewire\RegisterTenant;
use Base33\BossOnboarding\Console\Commands\PublishViewsCommand;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
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
            ->hasMigration('create_bossonboarding_table')
            ->hasCommand(PublishViewsCommand::class)
            ->hasAssets();
    }

    public function boot(): void
    {
        parent::boot();

        // Register Livewire components
        Livewire::component('register-tenant', RegisterTenant::class);
    }
}
