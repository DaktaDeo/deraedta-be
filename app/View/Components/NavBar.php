<?php

namespace App\View\Components;

use DaktaDeo\LaravelMultipassConnector\Enums\WebmenuLinkType;
use DaktaDeo\LaravelMultipassConnector\Models\Webmenu;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class NavBar extends Component
{
    protected Collection $items;

    protected Webmenu $menu;

    public function __construct(Webmenu $menu)
    {
        $this->menu = $menu;
        $this->items = collect($menu->children);

        // recursively map the children to collections
        $this->items = $this->items->map(function ($item) {

            if ($item->system_menu_type === WebmenuLinkType::CONTENT) {
                $item->url = '/'.$item->slug;
            }

            $item->children = collect($item->children);
            if ($item->children->isNotEmpty()) {
                $item->children = $item->children->map(function ($child) {

                    if ($child->system_menu_type === WebmenuLinkType::CONTENT) {
                        $child->url = '/'.$child->slug;
                    }

                    $child->children = collect($child->children);

                    return $child;
                });
            }

            return $item;
        });
    }

    //sortedItems
    public function sortedItems(): Collection
    {
        return $this->items->sortBy('_lft');
    }

    public function render(): View
    {
        return view('components.nav-bar', ['items' => $this->items, 'menu' => $this->menu]);
    }
}
