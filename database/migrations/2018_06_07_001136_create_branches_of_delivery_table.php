<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesOfDeliveryTable extends Migration
{
    /**
     * Run the migrations. - Отделения курьерской службы и их адреса(Новая почта, ИнТайм)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches_of_delivery', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); // название отделения курьерской службы
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches_of_delivery');
    }
}
