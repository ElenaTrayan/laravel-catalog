<?php

namespace App\Http\Controllers;

//use App\Models\Letter;
use App\Letter;
use App\Models\City;
use App\Models\CityDeliveryType;
use App\Models\DeliveryType;
use App\Models\Page;
use App\Models\Product;
use App\Models\Trademark;
use App\Models\User;
use App\Models\Region;
use Illuminate\Http\Request;
//use View;
use Illuminate\Support\Carbon;

class PagesController extends Controller
{

    public function index()
    {
        $page = Page::whereAlias('/')->firstOrFail();

        //$slider = new Slider();


        $actionProducts = Product::selectRaw('products.id, products.page_id, products.alias, products.state, products.new, products.action, products.is_published, products.title, products.price, products.old_price, products.published_at')
//            ->where('products.action', '=', 1)
            //выводим случайные товары Акция
            ->with([
                'category' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container']);
                },
                //синтаксис с точкой используется для цепочки последовательных связей
                'category.parent' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container']);
                },
                'category.parent.parent' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container']);
                },
            ])
            ->inRandomOrder()
            ->whereAction(1)
            ->published()
            ->limit(12)
            ->get();

        //Нужно выводить товары, которые появились в этом месяце (сортировка - самые новые в начале)
        //Если новинок нет, то выводим товары из базы, где колонка new = 1
        $newProducts = Product::selectRaw('products.id, products.page_id, products.alias, products.state, products.new, products.action, products.is_published, products.title, products.price, products.old_price, products.published_at')
//            ->where('products.action', '=', 1)
            //выводим случайные товары Акция
            ->with([
                'category' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container']);
                },
                //синтаксис с точкой используется для цепочки последовательных связей
                'category.parent' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container']);
                },
                'category.parent.parent' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container']);
                },
            ])
            ->inRandomOrder()
            ->whereNew(1)
            ->published()
            ->limit(12)
            ->get();

        //Выводим торговые марки рандомно
        $trademarks = Trademark::selectRaw('trademarks.id, trademarks.title, trademarks.alias, trademarks.logo')
            //эти ТМ должны быть опубликованы
            ->inRandomOrder()
            ->limit(16)
            ->get();

//        dd($trademarks);

        return view('pages.index', compact('page', 'slider', 'actionProducts', 'newProducts', 'trademarks'));
    }

    /**
     * Show the application pages.
     *
     * @param \Illuminate\Http\Request $request
     * @param object $page
     * @return mixed
     *
     */
    public function pageOneLevel(Request $request, $page)
    {
        return $this->renderPage($request, $page);
    }

    public function pageTwoLevel(Request $request, $parentOne, $page)
    {
        return $this->renderPage($request, $page);
    }

    public function pageThreeLevel(Request $request, $parentOne, $parentTwo, $page)
    {
        return $this->renderPage($request, $page);
    }

    public function pageFourLevel(Request $request, $parentOne, $parentTwo, $parentThree, $page)
    {
        return $this->renderPage($request, $page);
    }

    protected function renderPage($request, $page)
    {
//        dd(url($request->getPathInfo()), $page->getUrl());
        // ������ � ���������� page �������� ������ alias ��������,
        // � ���� �� ����� ��������� �������, ���� ��� ��� ��������� ������ Page
        // ��� ����� ����� ������� ��������� ������� � ���������� �� ����� ������ �����
        // �����, �������, ��� ������ � ������ ������, �� ��� �� ����� �������, �.�. ����� �������������� ����

        // ��� �� ��������� �� �����, � ������ ;)
        //var_dump($page);

        // ��� �����������, ���� ���������� $page �� ������ ������ Page� ��� ���� url ������������ - 404
        if(url($request->getPathInfo()) != $page->getUrl()) {
            abort(404);
//            return view('pages.o', compact('page'));
        }

        // � ���� � ���������� $page - ������, ��� �� ����� ���������� � ������� foreach
        // ������ ���� � ������ ������
        // ��� ���:
//        dd($page->title);

        if(is_a($page, 'App\Models\Page')) {
            if($page->type == Page::TYPE_CATALOG) {
                return $this->getCatalogPage($request, $page);
            } else {
                if($page->id == Page::ID_CONTACT_PAGE) {
                    return $this->getContactPage($request,  $page);
                } elseif($page->id == Page::ID_SITEMAP_PAGE) {
                    return $this->getSitemapPage($request, $page);
                }
                elseif($page->id == Page::ID_DELIVERY_PAGE) {
                    return $this->getDeliveryPage($request, $page);
                }
                elseif($page->id == Page::ID_PAYMENT_PAGE) {
                    return $this->getPaymentPage($request, $page);
                }
                elseif($page->id == Page::ID_TM_PAGE) {
                    return $this->getTrademarksPage($request, $page);
                }
                return $this->getPage($request, $page);
            }
        } else {
            return $this->getProductPage($request, $page);
        }

//        if($page->is_container) {
//            return $this->getCategoryPage($request, $page);
//        } else {
//            return $this->getPage($request, $page);
//        }
    }

    /**
     * Other page
     *
     * @param $request
     * @param $settings
     * @param $page
     * @return mixed
     */
    protected function getPage($request, $page)
    {
        $childrenPages = \Cache::rememberForever('page.'. $page->id .'.children', function() use($page) {
            return $page->is_container
                ? $page->publishedChildren()->orderBy('published_at', 'DESC')->paginate(10)
                : [];
        });
//        \View::share('articlesWidget', new Articles());
        return view('pages.page', compact('page', 'childrenPages'));
    }
//    /**
//     * Get page info
//     *
//     * @param $request
//     * @param $page
//     * @return mixed
//     *
//     */
//    protected function getPage($request, $page)
//    {
//        return view('pages.page', compact('page'));
//    }

    /**
     * Contact page
     *
     * @param $request
     * @param $page
     * @return mixed
     *
     */
    protected function getContactPage($request, $page)
    {
        return view('pages.contact', compact('page', 'subjects'));
    }
    /**
     * Delivery page
     *
     * @param $request
     * @param $page
     * @return mixed
     *
     */
    protected function getDeliveryPage($request, $page)
    {
        return view('pages.delivery', compact('page'));
    }

    protected function getPaymentPage($request, $page)
    {
        return view('pages.payment', compact('page'));
    }

    protected function basket()
    {
        $page = new Page();
        $page->title = 'Корзина';

        return view('pages.basket', compact('page'));
    }

    protected function getBasketProducts(Request $request)
    {
        if($request->has('cart')) {
            $postCart = json_decode($request->get('cart'), true);
            $cart = [];
            $amount = 0;
            foreach ($postCart as $productId => $productCountArray) {
                $product = Product::whereId($productId)->with(['trademark'])->first();
                if(is_object($product)) {
                    $count = $productCountArray[0] ? $productCountArray[0] : 1;
                    $cart[] = [
                        'product_id' => $productId,
                        'product_model' => $product,
                        'count' => $count,
                    ];
                    $amount = $amount + $product->price * $count;
                }
            }

            $result = [
                'widgetCartContentHtml' => (string) view('layouts._widgetCartContent', compact('cart', 'amount'))->render()
            ];

            if($request->get('is_cart_page') == 'true') {
                $result['pageCartContentHtml'] = (string) view('layouts._pageCartContent', compact('cart', 'amount'))->render();
            }

            return \Response::json($result);
        }
        else{
            $cart = [];
            $result = [
                'widgetCartContentHtml' => (string) view('layouts._widgetCartContent', compact('cart'))->render()
            ];

            $result['pageCartContentHtml'] = (string) view('layouts._pageCartContent', compact('cart'))->render();

//            dd($cart);
            return \Response::json($result);
        }
    }

    protected function checkout()
    {
//        if($request->has('cart')){
//            return redirect()->route('profile', ['id' => 1]);
//        }
        $page = new Page();
        $page->title = 'Оформление заказа';

        $regions = Region::selectRaw('regions.id, regions.title')->get();


        $deliveriess = CityDeliveryType::selectRaw('cities_delivery_types.id, cities_delivery_types.city_id, cities_delivery_types.delivery_type_id')
            ->where('cities_delivery_types.city_id', 1)
//            ->with([
//                'cities' => function($q) {
//                    $q->select('id', 'title');
//                },
//                'delivery_types' => function($q) {
//                    $q->select('id', 'title');
//                }
//            ])
            ->get();
//        dd($deliveriess);

        return view('pages.checkout', compact('page', 'regions', 'deliveriess'));
    }

    public function cityByRegion($regionId){
        $cities = City::selectRaw('cities.id, cities.title, cities.region_id')
            ->where('cities.region_id', $regionId)
            ->get();
        $result = [
            'resultHtml' => (string) view('partials._selectOptions', compact('cities'))->render()
        ];
        return \Response::json($result);
    }

    public function deliveryByCity($cityId)
    {
        $deliveries = CityDeliveryType::selectRaw('cities_delivery_types.id, cities_delivery_types.city_id, cities_delivery_types.delivery_type_id')
            ->where('cities_delivery_types.city_id', $cityId)
//            ->with([
//                'cities' => function($q) {
//                    $q->select('id', 'title');
//                },
//                'delivery_types' => function($q) {
//                    $q->select('id', 'title');
//                }
//            ])
            ->get();

//        dd($deliveries);
        $result = [
            'resultHtml' => (string) view('partials._selectDelivery', compact('deliveries'))->render()
        ];
        return \Response::json($result);
    }

    /**
     * Sending
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     *
     */
    public function sendCheckout(Request $request)
    {

    }

    protected function getTrademarksPage($request, $page)
    {
        $trademarks = Trademark::selectRaw('trademarks.id, trademarks.title, trademarks.alias, trademarks.logo')
            //эти ТМ должны быть опубликованы
//            ->published()
            ->get();

        return view('pages.trademarks', compact('trademarks', 'page'));
    }

    public function trademarkPage(Request $request, $trademarkAlias)
    {
        $page = new Page();
        $page->title = 'Торговые марки';

        $trademark = Trademark::selectRaw('trademarks.id, trademarks.title, trademarks.alias, trademarks.content, trademarks.logo, trademarks.count_products')
            ->where('trademarks.alias', $trademarkAlias)
            ->first();
//            ->find(1);
//        dd($trademark->id);

        $products = Product::selectRaw('products.id, products.page_id, products.trademark_id, products.alias, products.state, products.new, products.action,products.is_published, products.title, products.code, products.price, products.old_price, products.discount_uah, products.published_at, products.introtext, products.content')
            //эти товары должны быть опубликованы
            ->published()
            ->with([
                'category' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container']);
                },
                //синтаксис с точкой используется для цепочки последовательных связей
                'category.parent' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container']);
                },
                'trademark' => function($q) {
                    $q->select(['id', 'title', 'alias']);
                },
            ])
            ->where('products.trademark_id', $trademark->id)
            ->get();

//        dd($products);

        return view('pages.trademark', compact('trademark','page', 'products'));
    }

    /**
     * HTML Sitemap page
     *
     * @param $request
     * @param $settings
     * @param $page
     * @return mixed
     *
     */
    protected function getSitemapPage(Request $request, $page)
    {
        $sitemapItems = \Cache::rememberForever('sitemapItems', function() {
            return Page::whereParentId(0)
                ->published()
                ->get(['id', 'parent_id', 'type', 'is_container', 'alias', 'title', 'menu_title']);
        });
        return view('pages.sitemap', compact('page', 'sitemapItems'));
    }

    public function sitemapXml()
    {
        $sitemapItems = Page::whereParentId(0)
            ->published()
            ->get(['id', 'parent_id', 'user_id', 'type', 'is_container', 'alias', 'title', 'menu_title', 'updated_at', 'published_at']);

        $content = \View::make('pages.sitemapXml', compact('sitemapItems'))->render();

        return response($content)->header('Content-Type', 'text/xml');
    }

    /**
     * Sending letter from contact form
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     *
     */
    public function sendLetter(Request $request)
    {
        $data = $request->all();
        $validator = \Validator::make($data, Letter::$rules);

        if($validator->fails()) {
            if($request->ajax()) {
                return \Response::json([
                    'success' => false,
                    'message' => 'Письмо не отправлено. Исправьте ошибки.',
                    'errors' => $validator->errors()
                ]);
            } else {
                return back()->withErrors($validator->errors())->withInput()
                    ->with('errorMessage', 'Письмо не отправлено. Исправьте ошибки.');
            }
        }

        if($letter = Letter::create($data)) {

            // Email to user
            if($request->get('send_copy')) {
                Mail::to($request->get('email'))->send(new FromContactformToUser($letter));
            }

            // Email to admin
            $admins = User::whereRole(User::ROLE_ADMIN)->active()->get();
            foreach ($admins as $admin) {
                Mail::to($admin->email)->send(new FromContactformToAdmin($letter));
            }

            if($request->ajax()) {
                return \Response::json([
                    'success' => true,
                    'message' => 'Ваше письмо успешно отправлено!',
                ]);
            } else {
                return back()->with('successMessage', 'Ваше письмо успешно отправлено!');
            }
        }
    }

    /**
     * Product catalog page
     *
     * @param $request
     * @param $settings
     * @param $page
     * @return mixed
     *
     */
    protected function getCatalogPage(Request $request, $page)
    {
//        $filterQuery = $request->get('query');

        //Нужно получить список всех подкатегорий категории
        //Делаю выборку информации о товарах из таблицы Product(с полями - selectRaw)
        $childCategories = $page->children()->published()
            ->has('products')
            ->whereIsContainer(1)
            ->with([
                'products' => function($q) {
                    $q->select('id', 'page_id', 'title');
                }
            ])
            ->get(['id', 'parent_id', 'menu_title', 'title', 'alias']);

        //Делаю выборку информации о товарах из таблицы Product(с полями - selectRaw)
//        $productsCategory =
        $query = Product::selectRaw('products.id, products.page_id, products.trademark_id, products.alias, products.state, products.new, products.action,products.is_published, products.title, products.code, products.price, products.old_price, products.discount_uah, products.published_at, products.introtext, products.content, products.minimal')
            //эти товары должны быть опубликованы
            ->published()
            //Жадная загрузка. Совершается меньшее количество запросов
            //category - связь таблицы products с таблицей pages (модель Page) - Один ко многим
            // по полю page_id (табл. products) = id (табл. pages)
            //Сначала выбираются перечисленные поля из таблицы products: select * from products ...
            //Затем выбираем все категории для каждого из продуктов
            //select * from pages where page_id in (1, 2, 3, 4, 5, ...)
            ->with([
                'category' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container']);
                },
                //синтаксис с точкой используется для цепочки последовательных связей
                'category.parent' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container']);
                },
                'trademark' => function($q) {
                    $q->select(['id', 'title']);
                },
            ]);
//            ->whereIn('page_id', array([$page->children()->pluck("id")
//            ]))
            //я выбрала информацию для продуктов, у которых page_id (id родителя) равен id текущей страницы
//            ->wherePageId($page->id);

//        dd(explode(',', $request->get('categories')));
            // фильтр подкатегорий
//            dd($request->get('price_from'), $request->get('price_to'));
            if($request->has('price_from')){
                $query = $query->where('price', '>=', $request->get('price_from'));
            }
            if($request->has('price_to')){
                $query = $query->where('price', '<=', $request->get('price_to'));
            }
            if($request->has('subcategories')) {
                $query = $query->whereIn('page_id', $request->get('subcategories'));
//                dd($subcategoryIds);
            } else {
                if(count($childCategories)) {
                    $query->whereIn('page_id', $childCategories->pluck('id'));
                } else {
                    $query->wherePageId($page->id);
                }
            }

            if($request->has('trademarks')) {
                $query = $query->whereIn('trademark_id', $request->get('trademarks'));
            }else {
                if(count($childCategories)) {
                    $query->whereIn('page_id', $childCategories->pluck('id'));
                } else {
                    $query->wherePageId($page->id);
                }
            }




        //Анонимная функция для случаев или то, или то
//            $products->where(function($query) use($childCategories, $page) {
//                $query->whereIn('page_id', $childCategories->pluck('id'))
//                ->orWhere('page_id', $page->id);
//            });

        //тоже самое без использования анонимной функции
//        ->whereIn('page_id', $childCategories->pluck('id'))
//        ->orWhere('page_id', $page->id);


//        $products = $products->$page;
//        dd($products);
//            ->children()->pluck('products.page_id');
//        $page = $page->children()->get();
//            ->pluck("id");
//        dd($page);

//        dd($childCategories->pluck('id'));

//        $products = $productsCategory

        $sortby = $request->get('sortby', 'price');
        $sortbyDirection = $request->get('direction', 'DESC');

        if($sortby == 'popular') {

        } else {
            $query = $query->orderBy($sortby, $sortbyDirection);
        }

        $products = $query
            ->paginate(20);
//            ->distinct()
//            ->get();
//        dd($products);

//        $products_trademarks = $productsCategory
////            Product::selectRaw('products.id, products.page_id, products.trademark_id')
////            ->distinct('products.trademark_id')
//            ->whereIn('products.trademark_id', [1,2,4,5,8,13])
//            ->distinct()
//            ->published()
//            ->get();
//        dd($products_trademarks);

//        $trademarks_list = Trademark::selectRaw('trademarks.id, trademarks.title, trademarks.alias')
//            ->whereIn('trademarks.id', $productsCategory->pluck('id'))
//            ->get();

        $trademarksId = $products->pluck('trademark_id')->unique()->toArray();
        $trademarks_list = Trademark::whereIn('trademarks.id', $trademarksId)
            ->get();
//        dd($trademarks_list);
        return view('pages.category', compact('page', 'childCategories', 'products', 'trademarks_list'));
    }

    /**
     * Product page
     *
     * @param $request
     * @param $settings
     * @param $page
     * @return mixed
     */
    protected function getProductPage($request, $page)
    {
//        dd($page);
        $trademarks = Trademark::selectRaw('trademarks.id, trademarks.title, trademarks.alias, trademarks.logo')
            ->inRandomOrder()
            ->limit(16)
            ->get();

        return view('pages.product', compact('page', 'trademarks'));
    }

}
