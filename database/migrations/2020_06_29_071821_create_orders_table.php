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
            $table->Increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->float('totalamount');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('payment_id');
            $table->unsignedInteger('ship_id');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('ship_id')->references('id')->on('shippings');
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
