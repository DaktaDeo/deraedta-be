<?php

namespace App\View\Components;

use App\Shared\NeedsToTransformSrcsetForFeaturedImage;
use DaktaDeo\LaravelMultipassConnector\Models\Webcontent;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListItem extends Component
{
    use NeedsToTransformSrcsetForFeaturedImage;

    public Webcontent $content;

    public string $slugPrefix;

    public function __construct(WebContent $content, string $slugPrefix = '')
    {
        $this->content = $content;
        $this->slugPrefix = $slugPrefix;
    }

    // get the slug, combine my slug with the prefix as a folder structure
    // if we have no prefix, just return the slug
    public function getSlug(): string
    {
        return ! empty($this->slugPrefix) ? $this->slugPrefix.'/'.$this->content->slug : $this->content->slug;
    }

    public function render(): View
    {
        return view('components.list-item');
    }
}
