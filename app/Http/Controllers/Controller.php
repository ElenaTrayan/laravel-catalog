<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        //TODO - нужно выбрать также Каталог товаров!!! но как?
        $mainMenu = Page::whereParentId(0)->whereIsContainer(0)->published()->get();

        View::share('mainMenu',$mainMenu);
    }
}
