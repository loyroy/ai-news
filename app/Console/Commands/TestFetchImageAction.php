<?php

namespace App\Console\Commands;

use App\Modules\Pexels\Actions\Contracts\FetchImageActionInterface;
use Illuminate\Console\Command;

class TestFetchImageAction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-fetch-image-action';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(
        private readonly FetchImageActionInterface $fetchImageAction,
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $searchQuery = 'business hand shaking graphs';

        $this->fetchImageAction->execute($searchQuery);
    }
}
