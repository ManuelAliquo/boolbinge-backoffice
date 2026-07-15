<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Run the migrations
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('trailer')->nullable();
            $table->enum('type', ['movie', 'show', 'anime']);
            $table->string('poster')->nullable();
            $table->year('release_year');
            $table->year('end_year')->nullable();
            $table->decimal('rating', 3, 1)->nullable();
            $table->string('production')->nullable();
            $table->string('length')->nullable();
            $table->timestamps();
        });
    }

    // Reverse the migrations
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
