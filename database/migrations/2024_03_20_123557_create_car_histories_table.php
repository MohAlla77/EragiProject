<?php

use App\Models\Car;
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
        Schema::create('car_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Car::class);

            $table->string('user_name');
            $table->string('Eng_name');
            $table->string('fix');
            $table->string('fix_doc');
            $table->string('Worker_name')->nullable();
            $table->string('Work_time');
            $table->string('status');
            $table->string('wait_reason');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_histories');
    }
};
