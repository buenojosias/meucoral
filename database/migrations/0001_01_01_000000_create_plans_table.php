<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 24);
            $table->decimal('price', 6, 2);
            $table->json('resources');
            // $table->integer('choirs_limit')->nullable();
            // $table->integer('choiristers_limit')->nullable();
            // $table->boolean('multigroup')->default(false);
            // $table->boolean('addresses')->default(true);
            // $table->boolean('contacts')->default(true);
            // $table->boolean('kins')->default(true);
            // $table->boolean('comments')->default(true);
            // $table->boolean('encounters')->default(false);
            // $table->boolean('encounter_planning')->default(false);
            // $table->boolean('attendances')->default(false);
            // $table->boolean('events')->default(false);
            // $table->boolean('event_participation')->default(false);
            // $table->boolean('queue')->default(false);
            // $table->boolean('vocal_classifications')->default(false);
            // $table->boolean('assessments')->default(false);
            // $table->boolean('song_lyrics')->default(false);
            // $table->boolean('song_commemorative_dates')->default(false);
            // $table->boolean('multiuser')->default(false);
            // $table->boolean('cash')->default(false);
            // $table->boolean('wallets')->default(false);
            // $table->boolean('donations')->default(false);
            // $table->boolean('suppliers')->default(false);
            // $table->boolean('products')->default(false);
            // $table->boolean('purchases')->default(false);
            // $table->boolean('sales')->default(false);
            // $table->boolean('tuition')->default(false);
            // $table->boolean('payment_gateway')->default(false);
            // $table->boolean('presentation_diagrams')->default(false);
            // $table->boolean('chorister_profiles')->default(false);
            // $table->boolean('avatar')->default(false);
            // $table->boolean('statistics')->default(false);
            // $table->boolean('audio')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
