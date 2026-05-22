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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('institution');
            $table->string('affiliation')->nullable();
            $table->string('degree');
            $table->string('field_of_study');
            $table->text('location');
            $table->integer('start_year')->nullable();
            $table->integer('end_year')->nullable();
            $table->enum('status', ['ongoing', 'completed'])->default('ongoing');
            $table->decimal('gpa', 3, 2)->nullable();
            $table->integer('order')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
