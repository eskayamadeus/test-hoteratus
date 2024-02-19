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
        Schema::create('revenue_strategies', function (Blueprint $table) {
            $table->id();
            // TODO: add hotel id like in old platform
            $table->string('channel')->index();
            $table->string('approach')->index();
            $table->string('increment_type');
            $table->string('value_type');
            $table->decimal('value')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenue_strategies');
    }
};
