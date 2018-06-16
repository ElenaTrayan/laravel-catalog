<?php

namespace App\Http\Controllers;

//use App\Models\Letter;
use App\Letter;
use App\Models\Page;
use App\Models\Product;
use App\Models\Trademark;
use App\Models\User;
use Illuminate\Http\Request;
//use View;
use Illuminate\Support\Carbon;

class CabinetController extends Controller
{

    public function index()
    {
        $page = new Page();
        $page->title = 'Личные данные';

        return view('cabinet.index', compact('page'));
    }

}
