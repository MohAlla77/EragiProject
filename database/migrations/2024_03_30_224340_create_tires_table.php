<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tires', function (Blueprint $table) {

            $table->id();
            $table->string('tire_serial');
            $table->string('size');
            $table->string('amount');
            $table->string('price');
            $table->string('country_of_construction');
            $table->string('model');
            $table->string('quantity_available');
            $table->date('production_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tires');
    }
};
