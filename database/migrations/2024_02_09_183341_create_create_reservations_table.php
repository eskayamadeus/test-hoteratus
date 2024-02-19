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
        Schema::create('create_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('send_mail')->nullable();
            $table->string('g_fname')->nullable();
            $table->string('g_lname')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('language');
            $table->string('arrival')->nullable();
            $table->string('payment_method');
            $table->string('cardholder_name')->nullable();
            $table->string('card_type')->nullable();
            $table->string('date')->nullable();
            $table->string('cvc_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_reservations');
    }
};
