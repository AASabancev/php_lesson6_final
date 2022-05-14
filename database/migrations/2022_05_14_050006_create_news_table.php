<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table
                ->unsignedBigInteger('author_id')
                ->comment('Автор новости');

            $table->foreign('author_id')
                ->references('id')
                ->on('users');

            $table
                ->dateTime('datetime')
                ->comment('Отображаемая дата новости');

            $table
                ->string('title')
                ->comment('Название новости');

            $table
                ->text('description')
                ->comment('Описание новости');

            $table
                ->string('image_url')
                ->nullable()
                ->comment('Фото новости');

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
        Schema::dropIfExists('news');
    }
}
