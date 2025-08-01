<?php

namespace Base33\BossOnboarding\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishViewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bossonboarding:publish-views {--force : Overwrite existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish BossOnboarding views to the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Publishing BossOnboarding views...');

        $sourcePath = __DIR__ . '/../../../resources/views';
        $destinationPath = resource_path('views/vendor/bossonboarding');

        if (!File::exists($sourcePath)) {
            $this->error('Source views directory not found!');
            return 1;
        }

        // Create destination directory if it doesn't exist
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // Copy all view files
        $this->copyDirectory($sourcePath, $destinationPath);

        $this->info('BossOnboarding views published successfully!');
        $this->info('Views are now available at: ' . $destinationPath);

        return 0;
    }

    /**
     * Copy a directory recursively.
     */
    private function copyDirectory(string $source, string $destination): void
    {
        $files = File::allFiles($source);

        foreach ($files as $file) {
            $relativePath = $file->getRelativePathname();
            $destinationFile = $destination . '/' . $relativePath;
            $destinationDir = dirname($destinationFile);

            // Create directory if it doesn't exist
            if (!File::exists($destinationDir)) {
                File::makeDirectory($destinationDir, 0755, true);
            }

            // Check if file already exists
            if (File::exists($destinationFile) && !$this->option('force')) {
                if (!$this->confirm("File {$relativePath} already exists. Overwrite?")) {
                    continue;
                }
            }

            File::copy($file->getPathname(), $destinationFile);
            $this->line("Published: {$relativePath}");
        }
    }
}
