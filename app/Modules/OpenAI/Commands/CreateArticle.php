<?php

namespace App\Modules\OpenAI\Commands;

use App\Modules\OpenAI\Actions\Contracts\CreateArticleActionInterface;
use Illuminate\Console\Command;

class CreateArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-article';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(
        private readonly CreateArticleActionInterface $createArticleAction,
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $amount = $this->ask('How many articles would you like to generate? (1-25)', 1);

        $progressBar = $this->output->createProgressBar($amount);
        $progressBar->start();

        for ($i = 0; $i < $amount; $i++) {
            $this->createArticleAction->execute();
            $progressBar->advance();
        }

        $progressBar->finish();
    }
}
