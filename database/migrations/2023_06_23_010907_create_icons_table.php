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
        Schema::create('icons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('classes');
            $table->enum('category', ['accessibility', 'alert', 'animals', 'arrows', 'brands', 'building', 'business', 'code', 'communication', 'design', 'device', 'e-commerce', 'emoji', 'files & folders', 'finance', 'food & service', 'health', 'interface', 'layout', 'loader', 'misc', 'music', 'network', 'object', 'photo & video', 'shape', 'sports & games', 'time', 'travel', 'user', 'weather', 'writing']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icons');
    }
};
