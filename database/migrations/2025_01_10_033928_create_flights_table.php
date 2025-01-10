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
        Schema::create('flights', function (Blueprint $table) {
            $table->id('flights_id');
            $table->string('flight_no');
            $table->string('departure_city');
            $table->string('arrival_city');
            $table->decimal('price', 8, 2); // To store prices, with up to two decimal places
            $table->enum('cabin_class', ['economy', 'business', 'first']); // Enum for cabin classes
            $table->unsignedBigInteger('destination_id'); // Ensure it's unsigned big integer
            $table->foreign('destination_id')
            ->references('destination_id')
            ->on('destinations')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
