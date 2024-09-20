<?php

namespace App\View\Components;

use App\Shared\NeedsToTransformSrcsetForFeaturedImage;
use Closure;
use DaktaDeo\LaravelMultipassConnector\Models\Webcontent;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Block extends Component
{
    use NeedsToTransformSrcsetForFeaturedImage;

    public Webcontent $content;

    public function __construct(Webcontent $block)
    {
        $this->content = $block;
    }

    public function render(): View|Closure|string
    {
        return view('components.block');
    }
}
