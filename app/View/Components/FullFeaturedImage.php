<?php

namespace App\View\Components;

use App\Shared\NeedsToTransformSrcsetForFeaturedImage;
use DaktaDeo\LaravelMultipassConnector\Models\Webcontent;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FullFeaturedImage extends Component
{
    use NeedsToTransformSrcsetForFeaturedImage;

    public Webcontent $content;

    public function __construct(Webcontent $content)
    {
        $this->content = $content;
    }

    public function render(): View
    {
        return view('components.full-featured-image');
    }
}
