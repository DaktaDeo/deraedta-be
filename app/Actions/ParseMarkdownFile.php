<?php

namespace App\Actions;

use App\Models\Post;
use GrahamCampbell\Markdown\Facades\Markdown;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter;

class ParseMarkdownFile extends FileAction
{
    public function __invoke(array $fileAttributes): Post
    {
        $post = new Post();

        $post->view = data_get($fileAttributes, 'view', 'index');
        $post->key = data_get($fileAttributes, 'pk', 0);
        $post->path = data_get($fileAttributes, 'path', 'index.md');

        $wantedFile = app(GetWantedFileName::class)($post->view);

        $result = Markdown::convert($this->disk->get($wantedFile));

        if ($result instanceof RenderedContentWithFrontMatter) {
            $post->frontMatter = $result->getFrontMatter();
            $post->processFrontMatter();
        }

        $post->pk = data_get($fileAttributes, 'pk', 0);
        $post->lastModified = $this->disk->lastModified($wantedFile);
        $post->content = $result->getContent();

        return $post;
    }
}
