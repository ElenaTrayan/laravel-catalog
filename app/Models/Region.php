<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    // в одной области может быть много городов
    public function cities()
    {
        return $this->hasMany(City::class, 'region_id');
    }

}
