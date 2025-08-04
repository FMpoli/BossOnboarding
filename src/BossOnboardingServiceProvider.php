<?php

namespace Base33\BossOnboarding;

use Base33\BossOnboarding\Console\Commands\PublishViewsCommand;
use Base33\BossOnboarding\Exceptions\Handler;
use Base33\BossOnboarding\Http\Livewire\RegisterTenant;
use Base33\BossOnboarding\Http\Middleware\EnsureTenantExists;
use Base33\BossOnboarding\Http\Middleware\TenantRequired;
use Base33\BossOnboarding\Http\Middleware\UnifiedErrorHandler;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BossOnboardingServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('bossonboarding')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoutes('web')
            ->hasRoutes('central')
            ->hasRoutes('tenant')
            ->hasMigration('create_bossonboarding_table')
            ->hasCommand(PublishViewsCommand::class)
            ->hasAssets('bossonboarding-assets');
    }

    public function boot(): void
    {
        parent::boot();

        // Register Livewire components
        Livewire::component('register-tenant', RegisterTenant::class);

        // Register middleware with high priority
        $this->app['router']->aliasMiddleware('ensure.tenant.exists', EnsureTenantExists::class);
        $this->app['router']->aliasMiddleware('tenant.required', TenantRequired::class);

        // Register global middleware to catch all tenant requests
        $this->app['router']->pushMiddlewareToGroup('web', EnsureTenantExists::class);

        // Register unified error handler for all domains
        $this->app['router']->pushMiddlewareToGroup('web', UnifiedErrorHandler::class);

        // Register custom exception handler
        $this->app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            Handler::class
        );
    }
}
