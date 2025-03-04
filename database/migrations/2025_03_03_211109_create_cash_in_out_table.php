<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashInOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_in_out', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('debt_amount')->nullable();
            $table->string('cash')->nullable();
            $table->string('diffrence')->nullable();
            $table->string('total_debt_amount')->nullable();
            $table->text('detail')->nullable();
            $table->string('document')->nullable();
            $table->string('type')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('cash_in_out');
    }
}
