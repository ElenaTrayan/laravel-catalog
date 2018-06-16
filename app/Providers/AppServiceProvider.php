<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Page;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $mainMenu = Page::whereParentId(0)->whereIsContainer(0)->get();

        $menuCategory = Page::with([
            'parent',
            'children' => function($child) {
                return $child->whereIsContainer(1);
            },
            'children.parent',
            'children.parent.parent'
        ])
            ->whereParentId(2)
            ->get();

//        dd($menuCategory);

        View::share('mainMenu',$mainMenu);
        View::share('menuCategory',$menuCategory);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
