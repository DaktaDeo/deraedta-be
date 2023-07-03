<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostDetail extends Component
{
    protected Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function render(): View
    {
        return view('components.post-detail', ['post' => $this->post]);
    }
}
