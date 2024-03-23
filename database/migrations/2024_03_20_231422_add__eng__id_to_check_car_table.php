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
        Schema::table('check_car', function (Blueprint $table) {
            //

            $table->foreignId('eng_id')->nullable()->after('car_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('check_car', function (Blueprint $table) {
            //
            $table->dropColumn('eng_id');
        });
    }
};
