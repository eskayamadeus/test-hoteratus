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
        Schema::create('scraped_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scraped_hotel_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->json('bed_types')->default(new \Illuminate\Database\Query\Expression('(JSON_ARRAY())'));
            $table->string('capacity')->nullable();
            $table->json('extra')->default(new \Illuminate\Database\Query\Expression('(JSON_ARRAY())'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scraped_rooms');
    }
};
