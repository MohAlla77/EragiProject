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
            $table->string('quantity');
            $table->string('amount');
            $table->string('price');
            $table->string('country_of_construction');
            $table->string('model');
            $table->date('production_date');
            $table->string('quantity_available');
            $table->string('purchase_invoice');
            $table->string('tax_number');
            $table->string('supplier');
            $table->string('store_Place');
            $table->string('selling_price');
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
