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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('email')->unique();
            $table->string('name');
            $table->string('phone_number');
            $table->string('salary');
            $table->string('department');
            $table->date('direct_day');
            $table->string('address');
            $table->string('workplace');
            $table->string('marital_status');
            $table->string('nationality');
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
