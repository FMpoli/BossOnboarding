<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful - BossBoilerplate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full bg-gradient-to-br from-slate-50 to-slate-100">
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="text-center">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-100">
                    <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h1 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">
                    Registration Successful!
                </h1>
                <p class="mt-2 text-sm text-gray-600">
                    Your tenant has been successfully created and is ready to use
                </p>
            </div>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl sm:px-10">
                <div class="text-center space-y-6">
                    <div class="space-y-2">
                        <h2 class="text-lg font-semibold text-gray-900">
                            Welcome to BossBoilerplate!
                        </h2>
                        <p class="text-sm text-gray-600">
                            Your tenant environment is now ready. You can access your admin panel using the credentials you provided during registration.
                        </p>
                    </div>

                    @if(session('tenant'))
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h3 class="text-sm font-medium text-gray-900 mb-2">Your Tenant Details</h3>
                            <div class="space-y-2 text-sm text-gray-600">
                                <div class="flex justify-between">
                                    <span class="font-medium">Tenant Name:</span>
                                    <span>{{ session('tenant')->name }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-medium">Domain:</span>
                                    <span class="font-mono text-xs">{{ session('tenant')->domain }}.boss.ddev.site</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <a
                                href="https://{{ session('tenant')->domain }}.boss.ddev.site/app"
                                target="_blank"
                                class="flex w-full justify-center items-center rounded-lg bg-primary-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 transition-colors duration-200"
                            >
                                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                Access Admin Panel
                            </a>

                            <p class="text-xs text-gray-500">
                                Opens in a new tab
                            </p>
                        </div>
                    @endif

                    <div class="pt-6 border-t border-gray-200">
                        <div class="space-y-4">
                            <h3 class="text-sm font-medium text-gray-900">What's Next?</h3>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Log in to your admin panel
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Configure your tenant settings
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Start building your application
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-200">
                        <a
                            href="{{ route('tenant.register.create') }}"
                            class="text-sm font-medium text-primary-600 hover:text-primary-500 transition-colors duration-200"
                        >
                            ← Register Another Tenant
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
