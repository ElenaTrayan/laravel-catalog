<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Product;
use App\Models\Trademark;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $page = new Page();
        $page->title = 'Поиск';

        $searchQuery = $request->get('query');
        $orderBy = $request->get('order');
        $orderDirection = $request->get('direction', 'ASC');

        $results = new Collection();

        if($searchQuery) {
            //TODO - поиск по торговым маркам (trademark)
            // поиск по таблице products
            $productsQuery = Product::selectRaw('products.id, products.trademark_id, products.page_id, products.alias, products.code, products.state, products.new, products.action, products.is_published, products.title, products.price, products.old_price, products.published_at, MATCH (products.alias, products.title, products.introtext, products.content) AGAINST ("' . $searchQuery . '") AS score')
                ->published()
                ->with(['category', 'category.parent', 'category.parent.parent', 'trademark'])
                ->join('trademarks', 'trademarks.id', '=', 'products.trademark_id');
            $productsQuery->where(function($query) use($searchQuery) {
                $query->where('products.title', 'LIKE', "%$searchQuery%")
                    ->orWhere('products.alias', 'LIKE', "%$searchQuery%")
                    ->orWhere('products.code', 'LIKE', "%$searchQuery%")
                    ->orWhere(DB::raw('strip_tags(products.introtext)'), 'LIKE', "%$searchQuery%")
                    ->orWhere(DB::raw('strip_tags(products.content)'), 'LIKE', "%$searchQuery%")
                    // trademark
                    ->orWhere(DB::raw('trademarks.title'), 'LIKE', "%$searchQuery%");
            });

            if($orderBy){
                $productsQuery->orderBy($orderBy, $orderDirection);
            }
            // сортировка по количеству совпаений
            $productsQuery->orderBy('score', 'DESC');
            $products = $productsQuery->get();

            // поиск по таблице pages
            $pagesQuery = Page::selectRaw('pages.id, pages.parent_id, pages.type, pages.alias, pages.is_published, pages.is_container, pages.title, pages.menu_title, pages.introtext, pages.content, MATCH (title, alias, menu_title, introtext, content) AGAINST ("' . $searchQuery . '") AS score')
                ->published();
            $pagesQuery->where(function($query) use($searchQuery) {
                $query->where('title', 'LIKE', "%$searchQuery%")
                    ->orWhere('menu_title', 'LIKE', "%$searchQuery%")
                    ->orWhere('alias', 'LIKE', "%$searchQuery%")
                    ->orWhere(DB::raw('strip_tags(introtext)'), 'LIKE', "%$searchQuery%")
                    ->orWhere(DB::raw('strip_tags(content)'), 'LIKE', "%$searchQuery%");
            });
            if($orderBy){
                $pagesQuery->orderBy($orderBy, $orderDirection);
            }
            // сортировка по количеству совпаений
            $pagesQuery->orderBy('score', 'DESC');
            $pages = $pagesQuery->get();

            // поиск по таблице trademarks
//            $trademarksQuery = Trademark::selectRaw('trademarks.id, trademarks.title, MATCH (title) AGAINST ("' . $searchQuery . '") AS score');
//            $trademarksQuery->where(function($query) use($searchQuery) {
//                $query->where('title', 'LIKE', "%$searchQuery%");
//            });
//            if($orderBy){
//                $trademarksQuery->orderBy($orderBy, $orderDirection);
//            }
            // сортировка по количеству совпаений
//            $trademarksQuery->orderBy('score', 'DESC');
//            $trademarks = $trademarksQuery->get();

            $results = $results->merge($products)
                ->merge($pages)
//                ->merge($trademarks)
                ->sortByDesc('score')->values()->all();
        } else {
            $results = [];
        }

        return view('search.index', compact('page', 'results'));
    }

}
