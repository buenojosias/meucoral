<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('choir_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->date('date');
            $table->time('time')->nullable();
            $table->string('place')->nullable();
            $table->text('manager_description')->nullable();
            $table->text('chorister_description')->nullable();
            $table->text('public_description')->nullable();
            $table->boolean('is_presentation');
            $table->dateTime('last_answer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
