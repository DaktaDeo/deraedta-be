<?php

namespace App\Repositories;

use App\Actions\GetRelevantFilesFromFolder;
use App\Actions\ParseMarkdownFile;
use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PostsRepository
{
    public function all(): Collection
    {
        if (Cache::has('markdownPosts') && app()->environment() !== 'local') {
            return Cache::get('markdownPosts');
        }

        //get all the files from the root folder and convert them to a post with the ParseMarkdownFile action
        $posts = app(GetRelevantFilesFromFolder::class)('.')
            ->map(function ($file) {
                return app(ParseMarkdownFile::class)($file);
            });

        //add the posts to the cache forever
        if (app()->environment() !== 'local') {
            Cache::forever('markdownPosts', $posts);
        }

        return $posts;
    }

    //find a post by its view name
    public function find($view): ?Post
    {
        return $this->all()->firstWhere('view', $view);
    }

    // find all posts that have a certain tag
    public function findByTag($tag): Collection
    {
        return $this->all()->filter(function ($post) use ($tag) {
            return collect($post->tags)->contains($tag);
        });
    }

    // find all posts that have a certain category
    public function findByCategory($category): Collection
    {
        return $this->all()->filter(function ($post) use ($category) {
            return $post->category === $category;
        });
    }
}
