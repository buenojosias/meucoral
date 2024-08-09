<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->morphs('addressable');
            $table->string('address', 120);
            $table->string('complement', 30)->nullable();
            $table->string('district', 40);
            $table->foreignId('city_id')->constrained();
            $table->decimal('latitude', 10, 8)->nullable(); // Exceto para coralistas
            $table->decimal('longitude', 11, 8)->nullable();  // Exceto para coralistas
            $table->boolean('is_visible')->nullable(); // Exibe o local de ensaio publicamente
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
