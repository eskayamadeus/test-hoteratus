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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('properties_id')->constrained()->cascadeOnDelete();
            $table->string('room_name')->unique();
            $table->integer('room_quantity');
            $table->integer('maximum_occupancy');
            $table->integer('adult_capacity');
            $table->integer('children_capacity')->nullable();
            $table->string('status');
            $table->integer('number_of_bathrooms');
            $table->double('room_size');
            $table->string('selling_period');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
