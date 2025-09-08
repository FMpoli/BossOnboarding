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

        try {
            // Create tenant without using Filament
            $tenant = new Tenant;
            $tenant->name = $data['tenant_name'];
            $tenant->domain = $data['tenant_domain'];
            $tenant->database = Str::slug($data['tenant_name']);
            $tenant->save();

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

            \Log::info('Tenant ID before redirect: ' . $tenant->id);
            return redirect()->route('register.success')->with('tenant_id', $tenant->id);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Errore durante la creazione del tenant: '.$e->getMessage()])->withInput();
        }
    }

    public function success()
    {
        $tenant_id = session('tenant_id');
        $tenant = $tenant_id ? \App\Models\Tenant::find($tenant_id) : null;

        if (! $tenant) {
            // If no tenant in session, redirect back to registration
            return redirect()->route('register.tenant')->with('error', 'ID tenant non trovato nella sessione');
        }

        return view('bossonboarding::register-tenant-success', compact('tenant'));
    }
}
