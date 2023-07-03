<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostPreview extends Component
{
    public Post $post;

    public string $readMoreText;

    public bool $showExcerpt;

    public function __construct(Post $post, $readMoreText, $showExcerpt)
    {
        $this->post = $post;
        $this->readMoreText = $readMoreText ?? 'Read more &rarr;';
        $this->showExcerpt = $showExcerpt ?? true;
    }

    public function render(): View
    {
        return view('components.post-preview', [
            'post' => $this->post,
            'readMoreText' => $this->readMoreText,
            'showExcerpt' => $this->showExcerpt,
        ]);
    }
}
