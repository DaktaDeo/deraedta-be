<?php

namespace App\Http\Controllers;

use App\Repositories\PostsRepository;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected Filesystem $disk;

    public function __construct()
    {
        $this->disk = Storage::disk('content');
    }

    public function show($view = 'index')
    {
        if ($this->disk->exists($view.'.blade.php')) {
            return view($view, [
                'view' => $view,
            ]);
        }

        if ($this->disk->exists($view.'/index.blade.php')) {
            return view("content.$view.index", [
                'view' => $view,
            ]);
        }

        return view('post', [
            'post' => app(PostsRepository::class)->find($view),
        ]);
    }
}
