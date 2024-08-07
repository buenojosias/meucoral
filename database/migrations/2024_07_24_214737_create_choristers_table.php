<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('choristers', function (Blueprint $table) {
            $table->id()->from(101);
            $table->foreignId('choir_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->date('birthdate');
            $table->date('registration_date')->nullable();
            $table->string('status')->default('Ativo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('choristers');
    }
};
