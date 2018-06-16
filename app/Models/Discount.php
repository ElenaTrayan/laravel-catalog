<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';

    protected $fillable = array(
        'id',
        'percent_discount',
    );

    public static $rules = [
        'percent_discount' => 'integer',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'discount_id');
    }
}
