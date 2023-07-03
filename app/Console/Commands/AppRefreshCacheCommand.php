<?php

namespace App\Console\Commands;

use App\Repositories\PostsRepository;
use Illuminate\Console\Command;

class AppRefreshCacheCommand extends Command
{
    protected $signature = 'app:refresh-cache';

    protected $description = 'clears the post cache and rebuilds it';

    public function handle()
    {
        //cleare the markdownPosts cache and rebuild it
        cache()->forget('markdownPosts');
        // output line 'cache cleared' to the console
        $this->info('cache cleared');

        app(PostsRepository::class)->all();
        // output line 'cache rebuilt' to the console
        $this->info('cache rebuilt');
    }
}
