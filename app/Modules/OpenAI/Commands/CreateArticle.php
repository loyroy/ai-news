<?php

namespace App\Modules\OpenAI\Commands;

use App\Modules\Article\Repositories\Contracts\ArticleRepositoryInterface;
use App\Modules\OpenAI\Actions\Contracts\GenerateArticleActionInterface;
use App\Modules\Pexels\Actions\Contracts\FetchImageActionInterface;
use Illuminate\Console\Command;

class CreateArticle extends Command
{
    private const ARTICLE_AMOUNT_LIMIT = 50;

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
        private readonly GenerateArticleActionInterface $generateArticleAction,
        private readonly FetchImageActionInterface      $fetchImageAction,
        private readonly ArticleRepositoryInterface     $articleRepository,
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $amount = $this->ask('How many articles would you like to generate? (1-' . self::ARTICLE_AMOUNT_LIMIT . ')', 1);

        if($amount > self::ARTICLE_AMOUNT_LIMIT) {
            $this->warn('Please pick an article amount between 1 and ' .  self::ARTICLE_AMOUNT_LIMIT);
            return;
        }

        $progressBar = $this->output->createProgressBar($amount);
        $progressBar->start();

        for ($i = 0; $i < $amount; $i++) {
            $this->generateArticleAction->execute();

            if(!$this->generateArticleAction->getGeneratedArticle()) {
                $this->error('Article not set in GenerateArticleAction after generation');
                continue;
            }

            if(!$this->generateArticleAction->getGeneratedImageDescription()) {
                $this->error('Image Description not set in GenerateArticleAction after generation');
                continue;
            }

            $article = $this->generateArticleAction->getGeneratedArticle()->fresh();
            $imageUrl = $this->fetchImageAction->execute($this->generateArticleAction->getGeneratedImageDescription());
            $valuesToUpdate = ['image' => $imageUrl];
            $this->articleRepository->update($article->getAttribute('uuid'), $valuesToUpdate);

            $this->generateArticleAction->setGeneratedArticle(null);
            $this->generateArticleAction->setGeneratedImageDescription(null);

            $progressBar->advance();
        }

        $progressBar->finish();
    }
}
