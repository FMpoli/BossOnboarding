# FilamentPHP Plugin for BossBoilerplate – Tenant Registration Module

[![Latest Version on Packagist](https://img.shields.io/packagist/v/base33/bossonboarding.svg?style=flat-square)](https://packagist.org/packages/base33/bossonboarding)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/base33/bossonboarding/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/base33/bossonboarding/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/base33/bossonboarding/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/base33/bossonboarding/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/base33/bossonboarding.svg?style=flat-square)](https://packagist.org/packages/base33/bossonboarding)

A comprehensive Laravel package for BossBoilerplate that provides a complete tenant registration system with modern web forms.

## Features

-   **Public Registration Form**: Accessible before login for new tenant registration
-   **Multi-tenant Support**: Built for `spatie/laravel-multitenancy`
-   **Modern UI**: Tailwind CSS 4 best practices with responsive design
-   **Accessibility**: WCAG compliant forms with proper ARIA labels
-   **Validation**: Comprehensive form validation with error handling
-   **Success Flow**: Complete onboarding experience with next steps guidance

## Installation

You can install the package via composer:

```bash
composer require base33/bossonboarding
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="bossonboarding-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="bossonboarding-config"
```

This is the contents of the published config file:

```php
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
```

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="bossonboarding-views"
```

## Setup

### 1. Configure Multi-tenancy

Ensure your multi-tenancy is properly configured with `spatie/laravel-multitenancy`:

```php
// config/multitenancy.php

return [
    'tenant_finder' => \App\Multitenancy\SubdomainTenantFinder::class,
    'switch_tenant_tasks' => [
        \App\Multitenancy\Tasks\SwitchTenantSessionTask::class,
        \Spatie\Multitenancy\Tasks\SwitchTenantDatabaseTask::class,
    ],
    'central_domains' => [
        'boss.ddev.site',
    ],
];
```

## Usage

### Tenant Registration Form

Access the registration form at:

-   Registration: `https://your-domain.com/register-tenant`
-   Success: `https://your-domain.com/register-tenant/success`

### Features

#### Tenant Registration Form

-   **Tenant Information**: Name and subdomain configuration
-   **Admin User Creation**: Complete admin account setup
-   **Validation**: Comprehensive form validation
-   **Error Handling**: User-friendly error messages
-   **Responsive Design**: Works on all device sizes

#### Success Page

-   **Tenant Details**: Display created tenant information
-   **Next Steps**: Guided onboarding process
-   **Admin Panel Access**: Direct link to tenant admin panel
-   **Additional Registration**: Option to register another tenant

## Configuration

### Customizing Domain Suffix

Update the domain suffix in your config:

```php
// config/bossonboarding.php

'default_domain_suffix' => env('BOSS_DOMAIN_SUFFIX', 'your-domain.com'),
```

### Customizing Admin Panel Path

Update the admin panel path:

```php
// config/bossonboarding.php

'admin_panel_path' => env('BOSS_ADMIN_PANEL_PATH', '/admin'),
```

## Customization

### Styling

The plugin uses Tailwind CSS 4 with a custom design system. You can customize the appearance by:

1. Publishing the views:

```bash
php artisan vendor:publish --tag="bossonboarding-views"
```

2. Modifying the published views in `resources/views/vendor/bossonboarding/`

### Form Validation

Customize validation rules by extending the controller:

```php
// Extend the TenantRegistrationController

class CustomTenantRegistrationController extends \Base33\BossOnboarding\Http\Controllers\TenantRegistrationController
{
    protected function validationRules(): array
    {
        return [
            'tenant_name' => ['required', 'string', 'max:255'],
            'tenant_domain' => ['required', 'string', 'max:255', 'unique:tenants,domain', 'regex:/^[a-zA-Z0-9-]+$/'],
            'admin_name' => ['required', 'string', 'max:255'],
            'admin_email' => ['required', 'string', 'email', 'max:255'],
            'admin_password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
```

## Testing

```bash
composer test
```

## Security

If you discover any security related issues, please email info@base33.it instead of using the issue tracker.

## Credits

-   [Francesco Mulassano](https://github.com/Base33)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
