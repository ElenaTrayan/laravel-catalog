<?php

namespace Modules\Admin\Controllers;

use App\Models\Page;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
//use View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;

class ProductsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
//        $products = Product::all();

        //Делаю выборку информации о товарах из таблицы Product(с полями - selectRaw)
        $products = Product::selectRaw('products.id, products.page_id, products.trademark_id, products.alias, products.state, products.new, products.action,products.is_published, products.title, products.code, products.barcode, products.price, products.old_price, products.discount_uah, products.published_at, products.introtext, products.content')
            //Жадная загрузка. Совершается меньшее количество запросов
            //category - связь таблицы products с таблицей pages (модель Page) - Один ко многим
            // по полю page_id (табл. products) = id (табл. pages)
            //Сначала выбираются перечисленные поля из таблицы products: select * from products ...
            //Затем выбираем все категории для каждого из продуктов
            //select * from pages where page_id in (1, 2, 3, 4, 5, ...)
            ->with([
                'category' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container', 'title']);
                },
                //синтаксис с точкой используется для цепочки последовательных связей
                'category.parent' => function($q) {
                    $q->select(['id', 'parent_id', 'alias', 'is_container', 'title']);
                },
                'trademark' => function($q) {
                    $q->select(['id', 'title']);
                },
            ])->get();
//        dd($products);

        return view('admin::products.index', compact('page', 'products'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        //dd($slide);
        return view('admin::products.edit',['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->all();
//        dd($product);
        $product->fill($data);

        $product->save();

        return redirect()->route('admin.products.index');
    }

    /**
     * Вывод формы для добавления товара вручную
     *
     * @return Response
     */
    public function create()
    {
        return view('admin::products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Product $productModel, Request $request)
    {
//        dd($request->all());
        $productModel->create($request->all());
        //return redirect()->route('posts');
        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        //if($slide->delete()) {
        //	return Redirect::route('admin_sliders')->with('message', 'Post deleted.');
        //}
//        опять из диплома брала? да
//        Лен,там версия старючая, в 5.5 вс по другому
        return redirect()->route('admin.products.index')->with('message', 'Slider deleted.');
    }

    public function deleteSelected(Request $request)
    {
        //array_keys - новый массив из ключей массива

        // все-таки нге зря пустой массив ставила :)
        // поняла, почему так? когда данных нет, по умолчанию seleced-items будет равна null,
        // а функцуия array_keys работает только с массивами
        // ну, вроде, работает
        // просто у тебя сообщения не выводятся, но это уже потом ;) ок
        // ладно, я пошла, я уже домой, что-то приболела. Понятно. Спасибо!
        $itemsIds = array_keys($request->get('seleced-items', [])); // массив с id записей, которые нужно удалить

        // сделаем проверку, чтоб не было ошибки при удалении, если данных нет,  +  чтоб отобразить другое сообщение
        if($itemsIds) {
            Product::destroy($itemsIds);

            return redirect()->route('admin.products.index')->with('message', 'Items has been deleted.');
        }

        return redirect()->route('admin.products.index')->with('message', 'Error deleting. Items not selected.');
    }

//    public function parser()
//    {
//        return view('admin::products.create');
        // $url - адрес страницы с которой будем парсить
//        $url = 'http://kharkovkanc.com.ua/';
//        // получим контент страницы в переменную $file
//        $file = file_get_contents($url);
//        dd($file);
//        return redirect()->route('admin.products.index');
//        require_once 'phpQuery/phpQuery/phpQuery.php';
//
//        $str = '<a id="elem" href="http://google.com">Ссылка</a>';
//        $html = phpQuery::newDocument($str);
//        $pq = pq($html);
//
//        $elem = $pq->find('#elem');
//        $href = $elem->attr('href');
//        var_dump($href);

//        //подгружаем библиотеку
//        require_once 'library/simplehtmldom.php';
//        //создаём новый объект
//        $html = new simple_html_dom();
//        //загружаем в него данные
//        $html = file_get_html('http://kharkovkanc.com.ua/');
//        //находим все ссылки на странице и...
//        if($html->innertext!='' and count($html->find('a'))) {
//            foreach($html->find('a') as $a){
//                //... что то с ними делаем
//            }
//        }
//        //освобождаем ресурсы
//        $html->clear();
//        unset($html);

//    }

}
