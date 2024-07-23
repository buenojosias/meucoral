<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('choir_profiles', function (Blueprint $table) {
            $table->id()->from(101);
            $table->foreignId('choir_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->string('institution')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('choir_profiles');
    }
};
