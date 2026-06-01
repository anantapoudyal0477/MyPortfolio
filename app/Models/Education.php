<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    /** @use HasFactory<\Database\Factories\EducationFactory> */
    use HasFactory;

    protected $table = "education";
    protected $fillable = [
        'institution',
        'affiliation',
        'degree',
        'field_of_study',
        'location',
        'start_year',
        'end_year',
        'status',
        'gpa',
        'order',
        'note'
    ];
    protected $casts = [
        'institution'=>'string',
        'affiliation'=>'string',
        'degree'=>'string',
        'field_of_study'=>'string',
        'location'=>'string',
        'status'=>'string',
        'gpa'=>'float',
        'order'=>'integer',
        'note'=>'string',
    ];
}
