<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_supplies', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('chicken_supply')->nullable();
            $table->string('discount_per_kg')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('received_amount')->nullable();
            $table->string('difference')->nullable();
            $table->string('debt')->nullable();
            $table->string('date')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('customer_supplies');
    }
}
