<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('choir_id')->constrained()->onDelete('cascade');
            $table->integer('number')->index();
            $table->string('title');
            $table->string('author')->nullable();
            $table->boolean('highlighted')->default(false);
            $table->boolean('shared')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->fullText('title');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
