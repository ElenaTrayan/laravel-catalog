<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public function region()
    {
        return $this->belongsTo(Region::class, 'trademark_id');
    }
}
