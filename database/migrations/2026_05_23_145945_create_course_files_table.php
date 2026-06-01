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
        Schema::create('course_files', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('title');
                $table->string('folder_name')->nullable();
            $table->string('file_name');    
            $table->string('file_path');
            $table->enum('level',['basic','advanced'])->default('basic');
            $table->timestamps();
            
            
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_files');
    }
};
