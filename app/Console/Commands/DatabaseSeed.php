<?php

namespace App\Console\Commands;

use App\Modules\Article\Seeders\ArticleSeeder;
use App\Modules\Author\Seeders\AuthorSeeder;
use Illuminate\Console\Command;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(
        private readonly Application $app,
    )
    {
        parent::__construct();
    }

    private array $seeders = [
        AuthorSeeder::class,
        ArticleSeeder::class,
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach ($this->seeders as $seederClass) {
            $this->newLine();
            $this->info('Running ' . $seederClass);
            if($seederClass === ArticleSeeder::class) {
                $useChatGPT = $this->confirm('Would you like to use ChatGPT to generate articles?');
                if($useChatGPT) {
                    $this->call('app:create-article');
                    continue;
                }
            }

            $seeder = $this->app->make($seederClass);
            $seeder->run();
        }

        $this->newLine();
    }
}
