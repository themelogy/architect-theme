<?php namespace Themes\Architect\Presenter;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Modules\Menu\Entities\Menuitem;
use Modules\Portfolio\Repositories\CategoryRepository;

class MenuModify
{
    public function compose(View $view)
    {
        $menuItem = Menuitem::whereHas('translations', function(Builder $q) {
            $q->where('title', 'Projeler');
        })->first();

        $categories = app(CategoryRepository::class)->all()->where('status', 1)->sortBy('ordering');
        if(count($menuItem)>0) {
            $menu = \Menu::instance('ust-menu');
            $menu->whereTitle($menuItem->title, function($sub) use ($categories){
                foreach ($categories as $category) {
                    $sub->add([
                        'title' => $category->title,
                        'url'  => $category->url
                    ]);
                }
            });
        }
    }
}