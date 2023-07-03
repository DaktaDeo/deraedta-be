<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class MasterLayout extends Component
{
    public Post $post;

    public string $pageTitle;

    public function __construct(Post|null $post = null, string $pageTitle = '')
    {
        $this->post = $post ?? new Post();
        //set the page title to the post title if it exists and the title is not empty, otherwise use the default
        $this->pageTitle = $post && ! empty($post->title) ? $post->title : $pageTitle;
    }

    public function render()
    {
        return view('layouts.master', [
            'post' => $this->post,
            'pageTitle' => $this->pageTitle,
        ]);
    }
}
