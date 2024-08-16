<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chorister_encounter', function (Blueprint $table) {
            $table->foreignId('chorister_id')->constrained()->cascadeOnDelete();
            $table->foreignId('encounter_id')->constrained()->cascadeOnDelete();
            $table->enum('attendance', ['P', 'F', 'J']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chorister_encounter');
    }
};
