<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id'); // id покупателя
            $table->integer('coupon_id')->nullable(); //
            $table->decimal('total_price', 12, 2); // суммарная стоимость
//            $table->tinyInteger('status'); // статус заказа
            $table->timestamps();
            $table->timestamp('paid_at')->nullable(); // дата оплаты (paid_up)
            $table->timestamp('closed_at')->nullable(); // когда был закрыт заказ, т.е. заказ был выполнен. точка
            $table->tinyInteger('payment_type'); // способ оплаты (Кредитная карта, наличными)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
