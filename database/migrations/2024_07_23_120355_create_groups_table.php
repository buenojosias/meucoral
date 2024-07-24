<?php

use App\Enums\GroupStatusEnum;
use App\Enums\WeekDayEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id()->from(101);
            $table->foreignId('choir_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->integer('min_age')->nullable();
            $table->integer('max_age')->nullable();
            $table->enum('encounter_weekday', WeekDayEnum::values());
            $table->time('encounter_time');
            $table->enum('status', GroupStatusEnum::values())->default('Ativo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
