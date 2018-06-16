<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $imagePath = '/uploads/products/';

    protected $fillable = array(
        'id',
        'trademark_id',
        'code',
        'title',
        'short_description',
        'description',
        'price',
        'old_price',
        'state',
        'photo',
        'photo_alt',
        'discount_id',
        'discount_uah',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'new',
        'action',
        'weight',
        'count',
        'barcode',
        'allow_comments',
        'rating',
        'published_at',
    );

    public static $rules = [
        'alias' => 'unique:pages,alias,:id|max:500|regex:/^[A-Za-z0-9\-_]+$/u',
        'trademark_id' => 'integer',
        'code' => 'integer',
        'title' => 'max:250',
        'short_description' => 'max:1200',
        'price' => 'integer',
        'old_price' => 'integer',
        'state' => 'boolean',
        'photo' => 'image|max:3072',
        'photo_alt' => 'max:350',
        'discount_id' => 'integer',
        'discount_uah' => 'integer',
        'meta_title' => 'max:300',
        'meta_description' => 'max:300',
        'meta_keywords' => 'max:300',
        'new' => 'boolean',
        'action' => 'boolean',
        'weight' => 'integer',
        'count' => 'integer',
        'allow_comments' => 'boolean',
        'rating' => 'integer',
        'is_published' => 'boolean',
    ];

    /**
     *  Статус публикации (значение поля is_published)
     */
    const UNPUBLISHED = 0;
    const PUBLISHED   = 1;

    public static $is_published = [
        self::UNPUBLISHED => 'Не опубликован',
        self::PUBLISHED   => 'Опубликован',
    ];

    /**
     *  Есть ли товар в наличии (значение поля state) available
     */
    const NOT_AVAILABLE = 0;
    const AVAILABLE   = 1;

    public static $states = [
        self::NOT_AVAILABLE => 'Нет в наличии',
        self::AVAILABLE   => 'В наличии',
    ];

    /**
     *  Есть ли товар в наличии (значение поля state) available
     */
    const NEW_PRODUCT = 1;

    public static $new = [
        self::NEW_PRODUCT => 'Новинка',
    ];

    /**
     *  Есть ли товар в наличии (значение поля state) available
     */
    const ACTION   = 1;

    public static $action = [
        self::ACTION   => 'Акция',
    ];

    /* page_id */
    // устанавливаем связь с таблицей pages (модель Page) - Один ко многим по полю page_id (табл. products) = id (pages)
    public function category()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function trademark()
    {
        return $this->belongsTo(Trademark::class, 'trademark_id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    /**
     *
     * @param $query
     * @return mixed
     */
    public function scopePublished($query) {
        return $query->where('products.is_published', '=', 1)
            ->where('products.published_at', '<=', Carbon::now());
    }

    /**
     * Get page url
     *
     * @param array $parameters
     * @return string
     */
    public function getUrl($parameters = [])
    {
        $parameters = count($parameters)
            ? urldecode("?" . http_build_query($parameters))
            : '';
//        dd($this->category);
        if($this->category) {
            return url($this->category->getUrl() . '/' . $this->alias) . $parameters;
        } else {
            return url($this->alias) . $parameters;
        }
    }

    /* Метод для вывода похожих товаров на странице текущего товара */
    public function getRelatedProducts() {
        $relatedProducts = Product::selectRaw('products.id, products.page_id, products.alias, products.state, products.new, products.action, products.is_published, products.title, products.price, products.old_price, products.published_at')
            ->where('products.page_id', '=', $this->category->id)
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
            ->published()
            ->limit(8)
            ->get();
        return $relatedProducts;
//        $query->where('products.page_id', '=', $this->category->id)
//            ->where('products.published_at', '<=', Carbon::now());
    }


//    public function getAllTable($query)
//    {
////        $products = $this->get();
////        orderBy('id')->
//        return $query->all();
////        return $products;
//
//    }


    public function getMetaTitle()
    {
        return $this->meta_title ?? $this->title ?? config('app.name', 'Laravel');
    }

    public function getMetaDesc()
    {
        return $this->meta_desc ?? 'Meta-tag description';
    }

    public function getMetaKey()
    {
        return $this->meta_key ?? 'Meta-tag keywords';
    }
}
