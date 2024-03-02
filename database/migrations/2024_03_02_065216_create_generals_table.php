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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_email');
            $table->string('site_phone');
            $table->string('site_address');
            $table->string('site_country');
            $table->string('site_city');
            $table->string('site_state');
            $table->string('site_postal_code');
            $table->string('site_logo')->nullable(true);
            $table->string('site_favicon')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generals');
    }
};
