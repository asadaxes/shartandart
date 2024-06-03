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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->text('logo_name')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('insta_url')->nullable();
            $table->string('pinta_url')->nullable();
            $table->string('linkdien_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->integer('mobile_number1')->nullable();
            $table->integer('mobile_number2')->nullable();
            $table->integer('mobile_number3')->nullable();
            $table->integer('mobile_number4')->nullable();
            $table->text('email')->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

// 1.logo
// 2.logo_name
// 3.fb_url
// 4.twitter_url
// 5.insta_url
// 6.pinta_url
// 7.linkdien_url
// 8.mobile_number1
// 9.email
// 10.mobile_number2
// 11.mobile_number3
// 12.mobile_number4
// 14.youtube_url
// 15.whatsapp_url
// 16.address1
// 17.addres2
