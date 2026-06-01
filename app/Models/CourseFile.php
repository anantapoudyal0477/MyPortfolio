<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseFile extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFileFactory> */
    use HasFactory;
        protected $table = 'course_files';
    protected $fillable = ['course_id','title', 'folder_name', 'file_name', 'file_path', 'level'];
    protected $casts = [
        'course_id' => 'integer',
        'title' => 'string',
         'folder_name' => 'string',
        'file_name' => 'string',
        'file_path' => 'string',
        'level' => 'string'
    ];
}
