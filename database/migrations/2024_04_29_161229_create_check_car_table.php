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
        Schema::create('check_car', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('car_id');
            $table->foreignId('eng_id')->nullable();
            $table->string('worker_name')->nullable();
            $table->string('exp_timeFix')->nullable();
            $table->string('exp_spear')->nullable();
            $table->string('customer_comment')->nullable();
            $table->string('fix_requirement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_car');
    }
};
