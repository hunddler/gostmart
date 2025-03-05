<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFatWasteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fat_waste', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('fat_waste_kg')->nullable();
            $table->string('fat_waste_rate')->nullable();
            $table->string('total')->nullable();
            $table->string('date')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('fat_waste');
    }
}
