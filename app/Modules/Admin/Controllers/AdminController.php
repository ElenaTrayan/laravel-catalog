<?php
/**
 * Created by PhpStorm.
 * User: DianaElena
 * Date: 05.10.2017
 * Time: 22:33
 */

namespace Modules\Admin\Controllers;
use App\Models\Page;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{

    public function __construct()
    {
        parent::__construct();
//        $this->middleware('auth:admin');
//        dd($countProducts);

//        return with($countProducts);
//        View::share($countProducts);
    }
    /**
     * Main page in admin panel
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin::admin.index');
    }



    /**
     * Search
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function search(Request $request)
//    {
//        $searchQuery = $request->get('query');
//        $results = new Collection();
//
//        if($searchQuery) {
//
//            $pagesResults = Page::select(DB::raw('*, MATCH(alias, title, menu_title, introtext, content) AGAINST("' . $searchQuery . '") AS score'))
//                ->where(function($query) use($searchQuery) {
//                    $query->where('title', 'LIKE', "%$searchQuery%")
//                        ->orWhere('menu_title', 'LIKE', "%$searchQuery%")
//                        ->orWhere('alias', 'LIKE', "%$searchQuery%")
//                        ->orWhere(DB::raw('strip_tags(introtext)'), 'LIKE', "%$searchQuery%")
//                        ->orWhere(DB::raw('strip_tags(content)'), 'LIKE', "%$searchQuery%");
//                })
//                ->with('children', 'user')
//                ->orderBy('score', 'DESC')
//                ->get();
//
//            $usersResults = User::select(DB::raw('*, MATCH(login, email, firstname, lastname, description) AGAINST("' . $searchQuery . '") AS score'))
//                ->where(function($query) use($searchQuery) {
//                    $query->where('login', 'LIKE', "%$searchQuery%")
//                        ->orWhere('firstname', 'LIKE', "%$searchQuery%")
//                        ->orWhere('lastname', 'LIKE', "%$searchQuery%")
//                        ->orWhere('email', 'LIKE', "%$searchQuery%")
//                        ->orWhere('description', 'LIKE', "%$searchQuery%");
//                })
//                ->orderBy('score', 'DESC')
//                ->get();
//
//            $results = $results->merge($usersResults)
//                ->merge($pagesResults)
//                ->sortByDesc('score')->values()->all();
//
//            return view('admin::admin.search', compact('searchQuery','results', 'pagesResults', 'usersResults'));
//        }
//
//        return view('admin::admin.search', compact('searchQuery','results'));
//    }
}