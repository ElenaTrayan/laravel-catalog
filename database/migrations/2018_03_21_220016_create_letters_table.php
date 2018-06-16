<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type')->default(1); //тип темы сообщения:
//            $table->string('subject', 500)->nullable();
            $table->text('message');
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone_cell', 10)->nullable();
            $table->boolean('is_important')->default(0);
            $table->timestamps();
            $table->timestamp('read_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('letters');
    }
}
