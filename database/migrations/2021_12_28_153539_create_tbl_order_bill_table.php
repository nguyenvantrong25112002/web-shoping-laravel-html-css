<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrderBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_bills', function (Blueprint $table) {
            $table->increments('id_bill');
            $table->integer('shipping_address_id');
            $table->text('order_notes')->nullable();
            $table->integer('customer_id');
            $table->string('code_bill', 255)->unique();
            $table->string('payment');
            $table->integer('total_money');
            $table->integer('subtotal');
            $table->integer('tax_vat');
            $table->integer('status_bill');
            $table->string('token_bill', 255)->nullable();
            $table->integer('qty_product')->nullable();
            $table->timestamps();
        });
        Schema::create('status_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('order_status_bills')->default(0);
            $table->integer('active')->nullable();
            $table->timestamps();
        });
        Schema::create('detailed_bills', function (Blueprint $table) {
            $table->increments('id_detailed_bills');
            $table->integer('bill_id');
            $table->integer('product_id');
            $table->text('name_product');
            $table->integer('price_product');
            $table->integer('quantily');
            $table->integer('price');
            $table->string('attribute', 20);
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
        Schema::dropIfExists('order_bills');
        Schema::dropIfExists('detailed_bills');
    }
}