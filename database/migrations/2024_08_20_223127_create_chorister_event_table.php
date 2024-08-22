<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chorister_event', function (Blueprint $table) {
            $table->foreignId('chorister_id')->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->enum('answer', ['Sim', 'Não', 'Talvez']);
            $table->enum('answered_by', ['Manager', 'Chorister']);
            $table->boolean('was_present')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chorister_event');
    }
};
