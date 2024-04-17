<?php

use App\Models\User;
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
        Schema::create('cars', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('phone', 15);
            $table->string('plate', 10)->nullable();
            $table->string('structure_no' , 20)->unique();
            $table->unsignedInteger('counter');
            $table->string('car_name');
            $table->string('service');
            $table->string('model');
            $table->string('brand');
            $table->text('comment')->nullable();
            $table->string('status');
            $table->json('images')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
