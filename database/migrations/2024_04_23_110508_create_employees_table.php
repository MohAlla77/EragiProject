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
            $table->string('employee_number');
            $table->string('identity_number');
            $table->string('phone_number');
            $table->string('department');
            $table->string('direct_manager');
            $table->string('baseic_salary');
            $table->string('housing_allowance');
            $table->string('other_allowances');
            $table->string('address');
            $table->string('marital_status');
            $table->string('nationality');
            $table->date('direct_day');
            $table->string('workplace');
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
