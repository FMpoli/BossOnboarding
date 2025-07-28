<?php

return [
    /*
    |--------------------------------------------------------------------------
    | BossOnboarding Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure the BossOnboarding package settings.
    |
    */

    'default_domain_suffix' => env('BOSS_DOMAIN_SUFFIX', 'boss.ddev.site'),

    'admin_panel_path' => env('BOSS_ADMIN_PANEL_PATH', '/app'),
];
