<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('travel_packages', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->id('package_id');
        $table->unsignedBigInteger('destination_id'); // Ensure it's unsigned big integer
            $table->foreign('destination_id')
            ->references('destination_id')
            ->on('destinations')
            ->onDelete('cascade');
        $table->string('name');
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2);
        $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_packages');
    }
};
