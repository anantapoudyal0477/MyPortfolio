<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /** @use HasFactory<\Database\Factories\ExperienceFactory> */
    use HasFactory;
    protected $table = "experiences";
    protected $fillable = [
        'company',
        'position',
        'start_date',
        'end_date',
        'description',
    ];
    protected $casts=[
        'company'=>'string',
        'position'=>'string',
        'description'=>'string',
    ];
}
