<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {

            $table->increments('id_banner');
            $table->string('img_banner', 255);
            $table->string('title_banner', 255)->nullable();
            $table->text('url_banner')->nullable();
            $table->text('slug_banner')->unique()->nullable();
            $table->text('description_banner')->nullable();
            $table->integer('status_banner')->default(0);
            $table->integer('order_banner')->default();
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
        Schema::dropIfExists('banners');
    }
}