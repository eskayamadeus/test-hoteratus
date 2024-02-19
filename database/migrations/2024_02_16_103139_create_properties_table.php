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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('hotel_name')->unique();
            $table->string('hotel_icon');
            $table->string('address');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('contact');
            $table->string('email');
            $table->string('currency');
            $table->integer('post_code');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('time_zone');
            $table->text('description')->nullable();
            $table->string('hotel_image_1')->nullable();
            $table->string('hotel_image_2')->nullable();
            $table->string('hotel_image_3')->nullable();
            $table->string('hotel_image_4')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
