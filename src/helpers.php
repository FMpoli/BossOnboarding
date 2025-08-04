<?php

/**
 * BossOnboarding Helper Functions
 *
 * This file contains helper functions for the BossOnboarding plugin.
 * These functions provide utility methods for common operations.
 */

if (!function_exists('boss_onboarding')) {
    /**
     * Get the BossOnboarding plugin instance.
     *
     * @return \Base33\BossOnboarding\BossOnboarding
     */
    function boss_onboarding()
    {
        return app('boss-onboarding');
    }
}

if (!function_exists('boss_onboarding_config')) {
    /**
     * Get a configuration value for the BossOnboarding plugin.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function boss_onboarding_config($key, $default = null)
    {
        return config("boss-onboarding.{$key}", $default);
    }
}

if (!function_exists('boss_onboarding_route')) {
    /**
     * Generate a URL to a BossOnboarding route.
     *
     * @param string $name
     * @param array $parameters
     * @param bool $absolute
     * @return string
     */
    function boss_onboarding_route($name, $parameters = [], $absolute = true)
    {
        return route("boss-onboarding.{$name}", $parameters, $absolute);
    }
}

if (!function_exists('boss_onboarding_view')) {
    /**
     * Get a BossOnboarding view.
     *
     * @param string $view
     * @param array $data
     * @return \Illuminate\View\View
     */
    function boss_onboarding_view($view, $data = [])
    {
        return view("boss-onboarding::{$view}", $data);
    }
}
