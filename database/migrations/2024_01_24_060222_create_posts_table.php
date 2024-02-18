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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug_category');
            $table->foreignId('user_id');
            $table->string('name')->nullable();
            $table->text('image')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            $table->text('blog_image');
            $table->string('published_at')->nullable();
            $table->string('negara')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
