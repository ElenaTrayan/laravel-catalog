<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrademarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trademarks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255); //описание ТМ
            $table->string('content')->nullable(); //описание торговой марки
            $table->string('logo', 300)->nullable(); //логотип ТМ
            $table->integer('count_products'); //количество продуктов с этой торговой маркой
            $table->integer('supplier_id')->nullable(); //id поставщика
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trademarks');
    }
}
