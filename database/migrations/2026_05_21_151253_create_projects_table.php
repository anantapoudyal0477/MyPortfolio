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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Untitled Project');
            $table->string('slug')->unique();
            $table->string('short_description')->default('');
            $table->text('description');
            //attribute for filtering and categorization
            $table->enum('status', ['completed', 'ongoing', 'upcoming']);
            $table->enum('type', ['web', 'mobile', 'desktop', 'other']);
            $table->enum('category', ['personal', 'academic', 'professional']);
            //links
            $table->string('github_link')->nullable();
            $table->string('live_link')->nullable();
            //additional attributes
            $table->string('technologies_used')->nullable();
            //languages  used
            $table->string('languages_used')->nullable();

            $table->string('database_used')->nullable();
            $table->enum('hosting_platform', ['local','aws','github pages'])->nullable();
            //order for display
            $table->integer('order')->default(0);
            $table->json('image_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
