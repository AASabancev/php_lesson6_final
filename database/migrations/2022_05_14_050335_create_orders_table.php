<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table
                ->unsignedBigInteger('author_id')
                ->comment('Заказчик');

            $table->foreign('author_id')
                ->references('id')
                ->on('users');

            $table
                ->string('email')
                ->comment('E-mail адрес заказчика');

            $table
                ->string('address')
                ->comment('Адрес доставки заказа');

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
        Schema::dropIfExists('orders');
    }
}
