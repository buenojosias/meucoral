<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chorister_group', function (Blueprint $table) {
            $table->foreignId('chorister_id')->constrained()->cascadeOnDelete();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['Ativo', 'Removido'])->default('Ativo');
            $table->dateTime('added_at');
            $table->dateTime('removed_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chorister_group');
    }
};
