<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trademark_id');
            $table->integer('page_id'); //страница-родитель (в какой категории находится)
            $table->integer('code')->unique(); // product_code
            $table->string('title'); // product_title
            $table->string('alias', 500);
            $table->boolean('is_published')->default(0);
            $table->text('introtext')->nullable(); //short_description
            $table->text('content')->nullable(); //description
            $table->decimal('price', 12, 2);
            $table->decimal('old_price', 12, 2)->nullable(); // старая цена
            $table->boolean('state'); // в наличии или нет
            $table->integer('minimal'); //минимальное количество - minimal
            $table->integer('package'); //количество в упаковке - package (amount in a package)
            $table->string('image', 300)->nullable(); // photo
            $table->string('image_alt', 1000)->nullable();
            $table->integer('discount_id')->nullable();
            $table->decimal('discount_uah', 12, 2)->nullable(); // скидка в гривне
            $table->string('meta_title', 600);
            $table->string('meta_desc', 800)->nullable();
            $table->string('meta_key', 800)->nullable();
            $table->boolean('new')->nullable(); // товар относится к Новинкам
            $table->boolean('action')->nullable(); // товар являтся Акционным
            $table->dateTime('start_activity')->nullable(); // дата и время первой продажи товара  ���� � ����� ������ ������� ������
            $table->dateTime('end_activity')->nullable(); // дата и время последней продажи товара���� � ����� ��������� ������� ������
            $table->decimal('weight', 12, 2)->nullable(); // вес товара
            $table->integer('count')->nullable(); // количество товара������ ������
            $table->string('barcode')->nullable(); // штрихкод����� ���
            $table->boolean('allow_comments')->default(0); // есть ли комментарии к товару��������� ��������������
//            $table->integer('rating')->nullable(); // ������� (0 �� 5.0) - decimal
            $table->timestamps();
            $table->timestamp('published_at')->nullable(); // дата публикации
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
