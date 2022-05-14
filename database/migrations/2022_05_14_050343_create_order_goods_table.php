<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_goods', function (Blueprint $table) {
            $table->id();

            $table
                ->unsignedBigInteger('order_id')
                ->comment('ID заказа');

            $table->foreign('order_id')
                ->references('id')
                ->on('orders');

            $table
                ->unsignedBigInteger('good_id')
                ->comment('ID товара');

            $table->foreign('good_id')
                ->references('id')
                ->on('goods');

            $table
                ->string('title')
                ->comment('Название');

            $table
                ->decimal('count', 10, 2)
                ->comment('Количество');

            $table
                ->decimal('cost',10,2)
                ->comment('Цена товара');

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
        Schema::dropIfExists('order_goods');
    }
}
