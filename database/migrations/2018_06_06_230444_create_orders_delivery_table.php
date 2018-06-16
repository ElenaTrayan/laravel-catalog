<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_delivery', function (Blueprint $table) {
            $table->integer('order_id');
            $table->integer('city_delivery_type_id');
            $table->string('address')->nullable(); // адрес доставки
            $table->string('comment')->nullable(); // комментарий к заказу
            $table->dateTime('delivery_date')->nullable(); // дата доставки курьером, дата отправки почтой или курьерской службой
            $table->decimal('weight_of_order', 12, 2)->nullable(); // вес заказа
            $table->decimal('order_size', 12, 2)->nullable(); // размер посылки
//            $table->tinyInteger('delivery_status')->default(1); // ожидает оплату, В обработке, оформлен, Заказ оправлен, получен, доставлен в отделение, доставлен курьером, отменен, возвращен, завершен (?)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_delivery');
    }
}
