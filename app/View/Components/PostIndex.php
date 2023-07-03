<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class PostIndex extends Component
{
    protected Collection $posts;

    protected string $pageTitle = '';

    protected string $pageSubtitle = '';

    protected string $pageLink = '';

    protected string $readMoreText = 'Read more';

    protected bool $showExcerpt = true;

    public function __construct($posts, $pageTitle, $pageLink, $pageSubtitle, $readMoreText, $showExcerpt = true)
    {
        $this->posts = $posts ?? collect();
        $this->pageTitle = $pageTitle;
        $this->pageLink = $pageLink;
        $this->pageSubtitle = $pageSubtitle;
        $this->readMoreText = $readMoreText;
        $this->showExcerpt = $showExcerpt;
    }

    public function render(): View
    {
        return view('components.post-index', [
            'posts' => $this->posts,
            'pageTitle' => $this->pageTitle,
            'pageLink' => $this->pageLink,
            'pageSubtitle' => $this->pageSubtitle,
            'readMoreText' => $this->readMoreText,
            'showExcerpt' => $this->showExcerpt,
        ]);
    }
}
