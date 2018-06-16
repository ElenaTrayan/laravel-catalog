<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0); //id родителя
            $table->integer('user_id'); //id пользователя, создавшего страницу
            $table->tinyInteger('type')->default(1); //тип страницы: каталог, обычная страница,
            $table->string('alias', 300); //url страницы
            $table->boolean('is_published')->default(0); //опубликована ли страница
            $table->boolean('is_container')->default(0); //есть ли дети у страницы
            $table->string('title', 500); //название страницы
            $table->string('menu_title', 100); //название страницы в меню
            $table->string('image', 300);
            $table->string('image_alt', 1000);
            $table->text('introtext'); //короткое описание страницы
            $table->text('content'); //контент страницы
            $table->string('meta_title', 600); //мета-тег title
            $table->string('meta_desc', 800); //мета-тег description
            $table->string('meta_key', 800); //мета-тег keywords
            $table->timestamps();
            $table->timestamp('published_at')->nullable(); //дата и время публикации
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
