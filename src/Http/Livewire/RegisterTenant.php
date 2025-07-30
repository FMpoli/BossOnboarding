<?php

namespace Base33\BossOnboarding\Http\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RegisterTenant extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data = [];

    public function mount(): void
    {
        // Inizializza il form con dati vuoti
        $this->registerTenantSchema->fill();
        logger('RegisterTenant component mounted');
    }

    public function registerTenantSchema(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Dati Tenant
                TextInput::make('tenant_name')
                    ->label('Nome tenant')
                    ->required(),
                TextInput::make('tenant_domain')
                    ->label('Dominio tenant')
                    ->required(),
                TextInput::make('tenant_database')
                    ->label('Database tenant')
                    ->required(),

                // Dati Utente
                TextInput::make('user_name')
                    ->label('Nome utente admin')
                    ->required(),
                TextInput::make('user_email')
                    ->label('Email utente admin')
                    ->email()
                    ->required(),
                TextInput::make('user_password')
                    ->label('Password utente admin')
                    ->password()
                    ->required(),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        logger('Create method called');
        $data = $this->registerTenantSchema->getState();
        logger('Form data: '.json_encode($data));

        try {
            // 1. Crea il tenant nella tabella tenants (landlord)
            $tenant = \App\Models\Tenant::create([
                'name' => $data['tenant_name'],
                'domain' => $data['tenant_domain'],
                'database' => $data['tenant_database'],
            ]);
            logger("Tenant '{$data['tenant_name']}' creato nella tabella tenants");

            // 2. Crea il database del tenant
            $tenant->createDatabase();
            logger("Database '{$data['tenant_database']}' creato per il tenant");

            // 3. Esegui le migration per il tenant usando l'approccio del comando
            $spatieTenant = \Spatie\Multitenancy\Models\Tenant::find($tenant->id);
            $spatieTenant->makeCurrent();

            // Usa il Migrator direttamente come nel comando
            $migrator = app(\Illuminate\Database\Migrations\Migrator::class);
            $migrator->setConnection('tenant');
            $migrator->getRepository()->setSource('tenant');
            $migrator->getRepository()->createRepository();
            $migrator->run([
                base_path('database/migrations/tenant'),
            ]);
            logger('Migration eseguite per il tenant');

            // 4. Crea il primo utente admin per il tenant
            \App\Models\User::create([
                'name' => $data['user_name'],
                'email' => $data['user_email'],
                'password' => \Illuminate\Support\Facades\Hash::make($data['user_password']),
            ]);
            logger('Utente admin creato per il tenant');

            $spatieTenant->forget();

            // Reset del form
            $this->registerTenantSchema->fill();

            // Messaggio di successo
            session()->flash('message', 'Tenant creato con successo!');
            logger('Onboarding completato!');

        } catch (\Exception $e) {
            logger('Errore durante la creazione del tenant: '.$e->getMessage());
            session()->flash('error', 'Errore durante la creazione del tenant: '.$e->getMessage());
        }
    }

    public function test(): void
    {
        logger('Test method called');
        dd('Test method works!');
    }

    public function render(): View
    {
        return view('bossonboarding::livewire.register-tenant');
    }
}
