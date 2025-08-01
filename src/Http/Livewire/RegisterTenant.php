<?php

namespace Base33\BossOnboarding\Http\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Illuminate\Contracts\View\View;
use Filament\Schemas\Schema;
use Livewire\Component;

class RegisterTenant extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data = [];

    public function mount(): void
    {
        // Inizializza lo schema con dati vuoti
        $this->form->fill();
        logger('RegisterTenant component mounted');
    }



    public function form(Schema $schema): Schema
    {
        return $schema
        ->components([

                    TextInput::make('tenant_name')
                        ->label('Nome Tenant')
                        ->required()
                        ->placeholder('Nome del tuo tenant'),

                    TextInput::make('tenant_domain')
                        ->label('Dominio')
                        ->required()
                        ->placeholder('mio-tenant'),

                    TextInput::make('tenant_database')
                        ->label('Database')
                        ->required()
                        ->placeholder('tenant_mio_tenant'),
                    TextInput::make('user_name')
                        ->label('Nome Utente')
                        ->required()
                        ->placeholder('Il tuo nome'),

                    TextInput::make('user_email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->placeholder('admin@example.com'),

                    TextInput::make('user_password')
                        ->label('Password')
                        ->password()
                        ->required()
                        ->placeholder('Password sicura'),
        ])->statePath('data');
    }

    public function create()
    {
        logger('Create method called');
        $data = $this->form->getState();
        logger('Schema data: ' . json_encode($data));

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

            // Reset del schema
            $this->form->fill();

            // Salva il tenant nella sessione e reindirizza alla pagina di successo
            session(['tenant' => $tenant]);
            logger('Onboarding completato!');

            return redirect()->route('register.success');

        } catch (\Exception $e) {
            logger('Errore durante la creazione del tenant: '.$e->getMessage());
            session()->flash('error', 'Errore durante la creazione del tenant: '.$e->getMessage());
        }
    }
    public function render(): View
    {
        return view('bossonboarding::livewire.register-tenant');
    }
}
