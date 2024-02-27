<?php

namespace App\Http\Controllers;

use App\Repositories\PostsRepository;
use DaktaDeo\LaravelMultipassConnector\Actions\FindWebMenuInTreeWithSlug;
use DaktaDeo\LaravelMultipassConnector\Repositories\WebsiteRepository;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
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

    public function show_old($view = 'index')
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

    public function handleDynamicContent(Request $request, $any = 'index')
    {
        $pathSegments = explode('/', $any);
        $wantedSlug = end($pathSegments);

        $website = $request->attributes->get('websiteModel');

        ray($wantedSlug)->green();

        //find the webmenu with the given slug
        $menu = app(FindWebMenuInTreeWithSlug::class)($website, $wantedSlug);

        ray($menu)->orange();

        //return 404 if the menu is not found for now
        if (! $menu->id) {
            abort(404);
        }

        //fetch the associated webcontent
        $content = app(WebsiteRepository::class)->getCompleteWebContent($menu->web_content_id);

        ray($content)->green();
        //return 404 if the content has no id
        if (! $content->id) {
            abort(404);
        }

        // for now, lets assume that the content is a list
        ray($content->query)->purple();
        $items = app(WebsiteRepository::class)->query($content->query);

        // future me: remember that the query will limit the fields requested but the resource will
        // still map all the fields, making some fields NULL while they are not in the query.

        ray($items)->green();

        return view('templates.list', [
            'content' => $content,
            'items' => $items,
        ]);
    }
}
