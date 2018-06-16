<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\Page
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Page[] $children
 * @property-read \App\Models\Page $parent
 * @mixin \Eloquent
 * @property int $id
 * @property int $parent_id
 * @property int $user_id
 * @property int $type
 * @property string $alias
 * @property int $is_published
 * @property int $is_container
 * @property string $title
 * @property string $menu_title
 * @property string $image
 * @property string $image_alt
 * @property string $introtext
 * @property string $content
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_key
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $published_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereImageAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereIntrotext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereIsContainer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereMenuTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereMetaDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereMetaKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUserId($value)
 */
class Page extends Model
{
//    use Rules;

    protected $table = 'pages';

    protected $imagePath = '/uploads/pages/';

    /**
     * ������������ ���������� �������
     */
    const MAX_LEVEL = 4; // 4 уровня
    /**
     * Id страницы "Каталог"����� �������
     */
    const ID_CATALOG_PAGE = 2;
    /**
     * Id страниц контактной формы и карты сайта������� � ���������� ����� � ����� �����
     */
    const ID_CONTACT_PAGE = 9;
    const ID_SITEMAP_PAGE = 10;
    const ID_DELIVERY_PAGE = 8;
    const ID_PAYMENT_PAGE = 7;
    const ID_TM_PAGE = 4;
    /**
     * Тип страницы (значение поля type)
     */
    const TYPE_PAGE        = 1;
    const TYPE_SYSTEM_PAGE = 2;
    const TYPE_CATALOG     = 3;
    public static $types = [
        self::TYPE_PAGE        => 'Страница',
        self::TYPE_SYSTEM_PAGE => 'Системная страница',
        self::TYPE_CATALOG     => 'Каталог',
    ];

    /**
     * �Статус публикации (значение поля is_published)
     */
    const UNPUBLISHED = 0;
    const PUBLISHED   = 1;

    public static $is_published = [
        self::UNPUBLISHED => 'Не опубликован',
        self::PUBLISHED   => 'Опубликован',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'parent_id',
        'user_id',
        'type',
        'alias',
        'is_published',
        'is_container',
        'title',
        'menu_title',
        'image',
        'image_alt',
        'introtext',
        'content',
        'published_at',
        'meta_title',
        'meta_desc',
        'meta_key',
    ];

    /**
     * @var array Validation rules
     *
     */
    public static $rules = [
        'alias' => 'unique:pages,alias,:id|max:500|regex:/^[A-Za-z0-9\-_]+$/u',
        'parent_id' => 'integer',
        'user_id' => 'integer',
        'type' => 'integer',
        'is_published' => 'boolean',
        'is_container' => 'boolean',
        'title' => 'required_without:menu_title|max:250',
        'menu_title' => 'required_without:title|max:50',
        'image' => 'image|max:3072',
        'image_alt' => 'max:350',
        'meta_title' => 'max:300',
        'meta_desc' => 'max:300',
        'meta_key' => 'max:300',
    ];

    /**
     * ������������ ��������
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }
    /**
     * ��� �������� ��������
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */
    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'page_id');
    }

    /**
     * Get page url
     *
     * @return mixed
     */
    public function getUrl()
    {
        if($this->parent_id) {
            return url($this->parent->getUrl() . '/' . $this->alias);
        } else {
            return url($this->alias);
        }
    }

    /**
     * Get page url
     *
     * @return mixed
     */
    public static function getPageUrl($id)
    {
        $page = Page::select(['id', 'parent_id', 'alias'])
            ->whereId($id)
            ->first();
        return $page ? $page->getUrl() : false;
    }

    /**
     * �������������� �������� ��������
     *
     * @return mixed
     *
     */
    public function publishedChildren()
    {
        return $this->hasMany(Page::class, 'parent_id')
            ->whereIsPublished(1)
            ->where('published_at', '<', date('Y-m-d H:i:s'));
    }

    /**
     * �������������� ������ � ��������
     *
     * @return mixed
     *
     */
    public function publishedProducts()
    {
        return $this->hasMany(Product::class, 'page_id')
            ->whereIsPublished(1)
            ->where('published_at', '<=', Carbon::now());
    }

    /**
     *
     * @param $query
     * @return mixed
     */
    public function scopePublished($query) {
        return $query->where('pages.is_published', '=', 1)
            ->where('pages.published_at', '<=', Carbon::now());
    }

    public function getTitle()
    {
        return $this->menu_title ? $this->menu_title : $this->title;
    }

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
