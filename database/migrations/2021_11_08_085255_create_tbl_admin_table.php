<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id_admin');
            $table->string('admin_name', 255)->nullable();
            $table->string('admin_img', 255)->nullable();
            $table->string('admin_email', 255)->nullable();
            $table->string('admin_pass', 255);
            $table->string('admin_remember', 255)->nullable();
            $table->string('admin_token', 255)->nullable();
            $table->integer('admin_phone')->nullable();
            $table->integer('admin_rank')->default(0);
            $table->string('admin_address', 255)->nullable();
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
        Schema::dropIfExists('admins');
    }
}