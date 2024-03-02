<?php

namespace App\Http\Controllers;

use App\Repositories\PostsRepository;
use DaktaDeo\LaravelMultipassConnector\Actions\FindWebmenuInTreeWithSlug;
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

    public function showWelcome(Request $request)
    {
        $website = $request->attributes->get('websiteModel');
        $homePageWebcontentModel = $request->attributes->get('homePageWebcontentModel');

        if ($homePageWebcontentModel) {
            $items = app(WebsiteRepository::class)->query($homePageWebcontentModel->query);
        } else {
            $items = [];
        }

        // show 404 if the home page webcontent model is not found
        if (! $homePageWebcontentModel) {
            abort(404);
        }

        return view('templates.page', [
            'items' => $items,
            'content' => $homePageWebcontentModel,
        ]);
    }

    public function handleDynamicContent(Request $request, $any = 'index')
    {
        $pathSegments = explode('/', $any);
        $wantedSlug = end($pathSegments);

        $website = $request->attributes->get('websiteModel');

        //        ray($wantedSlug)->green();

        //find the webmenu with the given slug
        $menu = app(FindWebmenuInTreeWithSlug::class)($website, $wantedSlug);

        $webcontent_id = data_get($menu, 'webcontent_id', -1);

        if ($webcontent_id < 0) {
            // the $website->webcontent_map contains a map of all the webcontent models as an associative array
            $arr = collect($website->webcontent_map)->firstWhere('slug', $wantedSlug) ?? [];
            $webcontent_id = data_get($arr, 'id', -1);

//            ray($webcontent_id)->purple();
        }

        if ($webcontent_id < 0) {
            abort(404);
        }

        //fetch the associated webcontent
        $content = app(WebsiteRepository::class)->getCompleteWebcontent($webcontent_id);

        //return 404 if the content has no id
        if (! $content->id) {
            abort(404);
        }

        // for now, lets assume that the content is a list
        $items = app(WebsiteRepository::class)->query($content->query);

        // future me: remember that the query will limit the fields requested but the resource will
        // still map all the fields, making some fields NULL while they are not in the query.

        //        ray($items)->green();

        $system_content_type = data_get($content, 'system_content_type', 'page');

        return view("templates.$system_content_type", [
            'content' => $content,
            'items' => $items,
        ]);
    }
}
