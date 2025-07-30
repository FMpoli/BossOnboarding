<?php

namespace Base33\BossOnboarding\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TenantRegistrationController extends Controller
{
    public function create()
    {

        return view('bossonboarding::register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenant_name' => ['required', 'string', 'max:255'],
            'tenant_domain' => ['required', 'string', 'max:255', 'unique:tenants,domain', 'regex:/^[a-zA-Z0-9-]+$/'],
            'admin_name' => ['required', 'string', 'max:255'],
            'admin_email' => ['required', 'string', 'email', 'max:255'],
            'admin_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        $tenant = Tenant::create([
            'name' => $data['tenant_name'],
            'domain' => $data['tenant_domain'],
            'database' => Str::slug($data['tenant_name']),
        ]);

        // Create the tenant's database
        $tenant->createDatabase();

        // Run migrations for the new tenant and create a default admin user
        $tenant->execute(function () use ($data) {
            $migrator = app(Migrator::class);
            $migrator->setConnection('tenant');
            $migrator->getRepository()->setSource('tenant');
            $migrator->getRepository()->createRepository();
            $migrator->run([
                base_path('database/migrations/tenant'),
            ]);

            User::create([
                'name' => $data['admin_name'],
                'email' => $data['admin_email'],
                'password' => Hash::make($data['admin_password']),
            ]);
        });

        return redirect()->route('register.success')->with('tenant', $tenant);
    }

    public function success()
    {
        return view('bossonboarding::register-tenant-success');
    }
}
