<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = array(
        'id',
        'title',
        'description',
    );

    public static $rules = [
        'title' => 'max:250',
    ];

    public function products()
    {
        return $this->hasMany(Trademark::class, 'supplier_id');
    }
}
