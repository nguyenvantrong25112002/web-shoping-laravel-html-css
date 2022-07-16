<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id_customer');
            $table->string('name_customer', 100);
            $table->string('img_customer', 250)->nullable();
            $table->string('email_customer', 100);
            $table->string('phone_customer', 100)->nullable();
            $table->string('password_customer', 250)->nullable();
            $table->string('address_customer', 250)->nullable();
            $table->date('birthday_customer')->nullable();
            $table->integer('status_customer')->default(0);
            $table->string('token_customer', 50)->nullable();
            $table->string('remember_customer', 150)->nullable();
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
        Schema::dropIfExists('customers');
    }
}