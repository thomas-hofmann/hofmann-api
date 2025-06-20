<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->float('temperature');
            $table->float('humidity');
            $table->string('condition'); // z.B. "sunny", "cloudy"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};