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
        // Precompila il dominio se fornito come parametro
        $domain = request()->get('domain');

        if ($domain) {
            $this->data = [
                'tenant_domain' => $domain,
                'tenant_name' => ucfirst($domain), // Capitalizza il nome del tenant
            ];
        }

        // Inizializza lo schema con i dati
        $this->form->fill($this->data);
        logger('RegisterTenant component mounted with domain: '.($domain ?? 'none'));
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
        logger('Schema data: '.json_encode($data));

        try {
            // Genera un nome database unico
            $databaseName = 'tenant_'.$data['tenant_domain'].'_'.strtolower(str_replace(['-', '_'], '', uniqid()));

            // 1. Crea il tenant nella tabella tenants (landlord)
            $tenant = \App\Models\Tenant::create([
                'name' => $data['tenant_name'],
                'domain' => $data['tenant_domain'],
                'database' => $databaseName,
            ]);
            logger("Tenant '{$data['tenant_name']}' creato nella tabella tenants con database '{$databaseName}'");

            // 2. Crea il database del tenant
            $tenant->createDatabase();
            logger("Database '{$databaseName}' creato per il tenant");

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
