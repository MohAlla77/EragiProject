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
        Schema::create('categorizes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('serial_number');
            $table->string('GroupID');
            $table->string('store_place');
            $table->string('SupplierName');
            $table->string('SupplierTaxNumber');
            $table->string('InvoiceDatePurchase');
            $table->string('amount');
            $table->string('price_cost');
            $table->string('unit_type');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorizes');
    }
};
