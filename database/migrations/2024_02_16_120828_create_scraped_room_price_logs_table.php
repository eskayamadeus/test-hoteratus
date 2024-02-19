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
        Schema::create('scraped_room_price_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scraped_room_id')->constrained()->cascadeOnDelete();
            $table->timestamp('stay_date');
            $table->decimal('price', 10, 2)->default(0);
            $table->boolean('refundable')->default(false);
            $table->timestamps();

            $table->unique(['scraped_room_id', 'stay_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scraped_room_price_logs');
    }
};
