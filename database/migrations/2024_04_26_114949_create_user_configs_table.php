<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->decimal('plan_cost');
            $table->enum('payment_cycle', ['Mensal', 'Anual'])->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('final_cost')->nullable();
            $table->date('last_payment')->nullable();
            $table->date('next_payment')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_configs');
    }
};
