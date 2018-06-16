<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesDeliveryTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities_delivery_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id'); // город, населенный пункт
            $table->integer('delivery_type_id'); // вид доставки
            $table->integer('branch_of_delivery_id')->nullable(); // отделение курьерской службы
            $table->decimal('cost_of_delivery', 12, 2); // стоимость доставки
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities_delivery_types');
    }
}
