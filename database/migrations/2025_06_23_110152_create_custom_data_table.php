<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('custom_data', function (Blueprint $table) {
            $table->id();
            $table->string('client'); // aus API-Key-Zuordnung
            $table->string('type')->nullable(); // optional: Sammlungstyp
            $table->json('data');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_data');
    }
};
