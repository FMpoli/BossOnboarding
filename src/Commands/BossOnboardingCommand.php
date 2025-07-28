<?php

namespace Base33\BossOnboarding\Commands;

use Illuminate\Console\Command;

class BossOnboardingCommand extends Command
{
    public $signature = 'bossonboarding';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
