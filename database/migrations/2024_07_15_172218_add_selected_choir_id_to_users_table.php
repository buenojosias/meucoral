<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('selected_choir_id')->nullable()->after('active')->constrained('choirs')->nullOnDelete();
            $table->string('selected_choir_name')->nullable()->after('selected_choir_id')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['selected_choir_id']);
            $table->dropColumn('selected_choir_id');
            $table->dropColumn('selected_choir_name');
        });
    }
};
