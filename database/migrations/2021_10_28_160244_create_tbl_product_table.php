<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id_product');
            // $table->integer('category_id');
            $table->string('name_product', 255);
            $table->text('slug_product')->unique();
            $table->string('img_product', 255);
            $table->integer('price_product');
            $table->integer('pricesale_product');
            $table->integer('saleoff_product')->nullable();
            $table->integer('quantity_product');
            $table->text('description_product')->nullable();
            $table->longText('details_product')->nullable();
            $table->integer('status_product')->default(0);
            $table->integer('view_product')->default(0);
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
        Schema::dropIfExists('products');
    }
}