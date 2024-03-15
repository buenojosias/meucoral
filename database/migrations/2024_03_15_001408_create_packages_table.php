<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 24);
            $table->json('resources');
            $table->decimal('price', 6, 2);
            $table->timestamps();
        });

        Schema::create('package_user', function (Blueprint $table) {
            $table->foreignId('package_id')->constrained();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->decimal('cost_change', 6, 2)->default(0);
            $table->decimal('final_cost', 6, 2);
            $table->tinyText('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('package_user');
        Schema::dropIfExists('packages');
    }
};
