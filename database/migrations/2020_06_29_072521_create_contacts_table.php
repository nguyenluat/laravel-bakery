<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('Phone');
            $table->string('address');
            $table->mediumText('content');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedInteger('customer_id');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
