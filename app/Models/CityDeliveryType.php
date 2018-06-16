<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityDeliveryType extends Model
{
    protected $table = 'cities_delivery_types';

    public function cities()
    {
        return $this->hasMany(City::class, 'city_id');
    }

    public function delivery_types()
    {
        return $this->hasMany(DeliveryType::class, 'delivery_type_id');
    }

    public function branch_of_delivery()
    {
        return $this->hasMany(BranchOfDelivery::class, 'branch_of_delivery_id');
    }
}
