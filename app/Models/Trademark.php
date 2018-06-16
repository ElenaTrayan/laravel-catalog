<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    protected $table = 'trademarks';

    protected $fillable = array(
        'id',
        'title',
        'description',
        'logo',
        'count_products',
        'supplier_id',
    );

    public static $rules = [
        'title' => 'max:250',
        'logo' => 'image|max:3072',
//        'logo_alt' => 'max:350',
        'count_products' => 'integer',
        'supplier_id' => 'integer',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'trademark_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
