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
       /* Schema::table('hotels', function (Blueprint $table) {
            $table->string('image_url')->nullable(); // URL for hotel images
        }); */

        Schema::table('hotels', function (Blueprint $table) {
            $table->string('booking_url')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            //
        });
    }
};
