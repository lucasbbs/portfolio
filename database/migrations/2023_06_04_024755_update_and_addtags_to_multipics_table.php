<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('multipics', function (Blueprint $table) {
            $table->string('name');
            $table->foreignId('tag_id')->constrained('tags')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('multipics', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('tag_id');
        });
    }
};
