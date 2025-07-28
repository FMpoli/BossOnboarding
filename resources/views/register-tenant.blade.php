<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Your Tenant - BossBoilerplate</title>
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
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    Register Your New Tenant
                </h1>
                <p class="mt-2 text-sm text-gray-600">
                    Set up your new tenant environment in minutes
                </p>
            </div>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl sm:px-10">
                @if ($errors->any())
                    <div class="mb-6 rounded-lg bg-red-50 p-4 ring-1 ring-red-200" role="alert" aria-live="polite">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">
                                    There were some problems with your input
                                </h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc space-y-1 pl-5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('tenant.register.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Tenant Information Section -->
                    <div class="space-y-4">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Tenant Information</h2>
                        </div>

                        <div>
                            <label for="tenant_name" class="block text-sm font-medium leading-6 text-gray-900">
                                Tenant Name
                            </label>
                            <div class="mt-2">
                                <input
                                    type="text"
                                    name="tenant_name"
                                    id="tenant_name"
                                    value="{{ old('tenant_name') }}"
                                    required
                                    class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6 @error('tenant_name') ring-red-300 focus:ring-red-500 @enderror"
                                    placeholder="Enter your tenant name"
                                    aria-describedby="tenant-name-error"
                                >
                            </div>
                            @error('tenant_name')
                                <p class="mt-2 text-sm text-red-600" id="tenant-name-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tenant_domain" class="block text-sm font-medium leading-6 text-gray-900">
                                Tenant Subdomain
                            </label>
                            <div class="mt-2">
                                <div class="flex rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-primary-600 @error('tenant_domain') ring-red-300 focus-within:ring-red-500 @enderror">
                                    <input
                                        type="text"
                                        name="tenant_domain"
                                        id="tenant_domain"
                                        value="{{ old('tenant_domain') }}"
                                        required
                                        class="block flex-1 border-0 bg-transparent py-3 px-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="mycompany"
                                        aria-describedby="tenant-domain-error"
                                    >
                                    <span class="inline-flex items-center rounded-r-lg border-0 bg-gray-50 px-4 text-gray-500 sm:text-sm">
                                        .boss.ddev.site
                                    </span>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                This will be your unique subdomain (e.g., mycompany.boss.ddev.site)
                            </p>
                            @error('tenant_domain')
                                <p class="mt-2 text-sm text-red-600" id="tenant-domain-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Admin User Details Section -->
                    <div class="space-y-4 pt-6 border-t border-gray-200">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Admin User Details</h2>
                            <p class="text-sm text-gray-600 mb-4">
                                Create the administrator account for your tenant
                            </p>
                        </div>

                        <div>
                            <label for="admin_name" class="block text-sm font-medium leading-6 text-gray-900">
                                Admin Name
                            </label>
                            <div class="mt-2">
                                <input
                                    type="text"
                                    name="admin_name"
                                    id="admin_name"
                                    value="{{ old('admin_name') }}"
                                    required
                                    class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6 @error('admin_name') ring-red-300 focus:ring-red-500 @enderror"
                                    placeholder="Enter admin name"
                                    aria-describedby="admin-name-error"
                                >
                            </div>
                            @error('admin_name')
                                <p class="mt-2 text-sm text-red-600" id="admin-name-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="admin_email" class="block text-sm font-medium leading-6 text-gray-900">
                                Admin Email
                            </label>
                            <div class="mt-2">
                                <input
                                    type="email"
                                    name="admin_email"
                                    id="admin_email"
                                    value="{{ old('admin_email') }}"
                                    required
                                    class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6 @error('admin_email') ring-red-300 focus:ring-red-500 @enderror"
                                    placeholder="admin@example.com"
                                    aria-describedby="admin-email-error"
                                >
                            </div>
                            @error('admin_email')
                                <p class="mt-2 text-sm text-red-600" id="admin-email-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="admin_password" class="block text-sm font-medium leading-6 text-gray-900">
                                Password
                            </label>
                            <div class="mt-2">
                                <input
                                    type="password"
                                    name="admin_password"
                                    id="admin_password"
                                    required
                                    class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6 @error('admin_password') ring-red-300 focus:ring-red-500 @enderror"
                                    placeholder="Enter password"
                                    aria-describedby="admin-password-error"
                                >
                            </div>
                            @error('admin_password')
                                <p class="mt-2 text-sm text-red-600" id="admin-password-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="admin_password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">
                                Confirm Password
                            </label>
                            <div class="mt-2">
                                <input
                                    type="password"
                                    name="admin_password_confirmation"
                                    id="admin_password_confirmation"
                                    required
                                    class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"
                                    placeholder="Confirm password"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button
                            type="submit"
                            class="flex w-full justify-center rounded-lg bg-primary-600 px-4 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 transition-colors duration-200"
                        >
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Register Tenant
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-xs text-gray-500">
                        By registering, you agree to our
                        <a href="#" class="font-medium text-primary-600 hover:text-primary-500">Terms of Service</a>
                        and
                        <a href="#" class="font-medium text-primary-600 hover:text-primary-500">Privacy Policy</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
