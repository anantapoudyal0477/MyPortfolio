<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MyFiles;

class Courses extends Model
{
    /** @use HasFactory<\Database\Factories\CoursesFactory> */
    use HasFactory;

    protected $table = 'courses';
    protected $fillable = ['name'];
    protected $casts = [
        'name'=>'encrypted'
    ];

    public function files(){
        return $this->hasMany(CourseFile::class, 'course_id', 'id');
    }
}
