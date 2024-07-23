<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('choirs', function (Blueprint $table) {
            $table->id()->from(101);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('domain', 70)->nullable()->unique();
            $table->string('age_group', 70);
            $table->string('category', 70);
            $table->integer('total_choristers')->default(0);
            $table->boolean('multigroup')->default(false);
            $table->boolean('active')->default(true);
            $table->boolean('visible')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('choirs');
    }
};
