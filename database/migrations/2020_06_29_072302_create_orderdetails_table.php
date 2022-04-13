<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('image');
            $table->float('totalamount');
            $table->integer('quantity');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('order_id');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}
