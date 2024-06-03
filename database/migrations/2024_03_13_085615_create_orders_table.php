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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('checkout_id');
            $table->string('name');
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->integer('amount')->nullable();
            $table->text('address')->nullable();
            $table->text('status')->nullable();
            $table->text('transaction_id')->nullable();
            $table->text('currency')->nullable();
            $table->text('cus_country')->nullable();
            $table->text('cus_postcode')->nullable();
            $table->text('cus_city')->nullable();
            $table->text('cus_addr2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};