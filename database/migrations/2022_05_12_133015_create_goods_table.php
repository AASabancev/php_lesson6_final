<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();

            $table
                ->unsignedBigInteger('category_id')
                ->comment('Категория товара');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table
                ->string('title')
                ->comment('Название товара');

            $table
                ->text('description')
                ->nullable()
                ->comment('Описание товара');

            $table
                ->decimal('cost',10,2)
                ->comment('Цена товара');

            $table
                ->string('image_url')
                ->nullable()
                ->comment('Фото товара');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
