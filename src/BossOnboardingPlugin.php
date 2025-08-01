<?php

namespace Base33\BossOnboarding;

use Filament\Contracts\Plugin;
use Filament\Panel;

class BossOnboardingPlugin implements Plugin
{
    public function getId(): string
    {
        return 'bossonboarding';
    }

    public function register(Panel $panel): void
    {

        // This plugin doesn't register any pages in the admin panel
        // The registration form is accessible publicly via web routes
    }

    public function boot(Panel $panel): void {}

    public static function make(): static
    {
        return app(static::class);
    }
}
