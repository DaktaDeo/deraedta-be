<?php

namespace App\Http\Controllers;

use DaktaDeo\LaravelMultipassConnector\Actions\FindWebmenuInTreeWithSlug;
use DaktaDeo\LaravelMultipassConnector\Enums\WebcontentTypes;
use DaktaDeo\LaravelMultipassConnector\Models\Webcontent;
use DaktaDeo\LaravelMultipassConnector\Repositories\WebsiteRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private function handleContent(Request $request, ?Webcontent $webcontent)
    {
        // if webcontent is null, we will show a 404
        if (! $webcontent) {
            abort(404);
        }
        // if webcconnect->id is null, we will show a 404
        if (! $webcontent->id) {
            abort(404);
        }

        $website = $request->attributes->get('websiteModel');

        $items = [];
        if (! empty($webcontent->query)) {
            // make sure our query has the fields we need
            $newFields = 'id,slug,title,system_content_type,publish_date';
            $query = $this->addFieldsToQueryString($webcontent->query, 'webcontents', $newFields);

            ray($query)->orange();


            // for now, lets assume that the content is a list
            // future me: remember that the query will limit the fields requested but the resource will
            // still map all the fields, making some fields NULL while they are not in the query.
            $items = app(WebsiteRepository::class)->query($query) ?? [];

            ray($items)->green();
            // fitler out the items that are lists
            $items = collect($items)
                ->filter(function ($item) {
                    return $item->system_content_type === WebcontentTypes::POST;
                })
                ->sortBy('publish_date');
        }
        $items = collect($items);

        // get the blocks linked as children if there are any
        $blocks = $webcontent->children ?? [];

        if (! empty($blocks)) {
            // if children are a anynomousresourceCollection we will resolve it
            if ($blocks instanceof AnonymousResourceCollection) {
                $blocks = $blocks->resolve($request);
            }

            //filter the blocks on type block
            $blocks = collect($blocks)
                ->mapInto(Webcontent::class)
                ->filter(function ($block) {
                    return $block->system_content_type === WebcontentTypes::BLOCK;
                })
                ->where('is_published', true)
                ->sortBy('publish_date');
        }

        $system_content_type = $webcontent->system_content_type ?? WebcontentTypes::PAGE;

        //if system_content_type is block, revert to page
        if ($system_content_type === WebcontentTypes::BLOCK) {
            $system_content_type = WebcontentTypes::PAGE;
        }

        //if the $content has blocks, and has no written content of its own, set the $onlyBlocks flag to true
        $onlyBlocks = $blocks->isNotEmpty() && empty($webcontent->content_markdown);

        return view("templates.$system_content_type", [
            'items' => $items,
            'content' => $webcontent,
            'website' => $website,
            'blocks' => $blocks,
            'onlyBlocks' => $onlyBlocks,
        ]);
    }

    public function showWelcome(Request $request)
    {
        $homePageWebcontentModel = $request->attributes->get('homePageWebcontentModel');

        return $this->handleContent($request, $homePageWebcontentModel);
    }

    public function handleDynamicContent(Request $request, $any = 'index')
    {
        $pathSegments = explode('/', $any);
        $wantedSlug = end($pathSegments);

        $website = $request->attributes->get('websiteModel');

        //find the webmenu with the given slug, if it exists
        $menu = app(FindWebmenuInTreeWithSlug::class)($website, $wantedSlug);

        $webcontent_id = data_get($menu, 'webcontent_id', -1);

        if ($webcontent_id < 0) {
            // the $website->webcontent_map contains a map of all the webcontent models as an associative array
            $arr = collect($website->webcontent_map)->firstWhere('slug', $wantedSlug) ?? [];
            $webcontent_id = data_get($arr, 'id', -1);
        }

        if ($webcontent_id < 0) {
            abort(404);
        }

        //fetch the associated webcontent
        $content = app(WebsiteRepository::class)->getCompleteWebcontent($webcontent_id);

        return $this->handleContent($request, $content);
    }

    private function addFieldsToQueryString(string $queryString, string $resource, string $fieldsToAdd): string
    {
        return preg_replace(
            "/(fields\[$resource\]=)([^&]*)/",
            "$1$2,$fieldsToAdd",
            $queryString
        );
    }
}
