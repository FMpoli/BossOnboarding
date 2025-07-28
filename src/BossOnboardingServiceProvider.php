<?php

namespace Base33\BossOnboarding;

use Base33\BossOnboarding\Commands\BossOnboardingCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BossOnboardingServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('bossonboarding')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoutes('web')
            ->hasMigration('create_bossonboarding_table')
            ->hasCommand(BossOnboardingCommand::class);
    }
}
