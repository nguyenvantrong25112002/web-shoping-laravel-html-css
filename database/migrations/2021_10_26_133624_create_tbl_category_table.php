<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorys', function (Blueprint $table) {
            $table->increments('id_category');
            $table->string('name_category', 100);
            $table->integer('order_category')->nullable();
            $table->integer('status_category')->default(0);
            $table->integer('parent_id')->default(0);
            $table->string('slug_category', 255)->unique();
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
        Schema::dropIfExists('categorys');
    }
}