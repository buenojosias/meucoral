<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chorister_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('kinship');
            $table->date('birthdate')->nullable();
            $table->string('profession')->nullable();
            $table->boolean('is_singer')->default(false);
            $table->boolean('is_instrumentalist')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kins');
    }
};
