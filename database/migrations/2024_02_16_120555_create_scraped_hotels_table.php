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
        Schema::create('scraped_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url_id');
            // TODO: add hotel id like in old platform
            $table->integer('minimum_stay')->default(1);
            // TODO: this might change to a relationship column with the channel manager table
            $table->string('channel')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scraped_hotels');
    }
};
