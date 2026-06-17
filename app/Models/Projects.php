<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectsFactory> */
    use HasFactory;
    protected $table="projects";
    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'status',
        'type',
        'category',
        'github_link',
        'live_link',
        'technologies_used',
        'database_used',
        'hosting_platform',
        'order',
        'image_url'
    ];
    protected $casts = [
        'github_link' => 'encrypted',
        'live_link' => 'encrypted',
        'technologies_used' => 'array',
        'database_used' => 'array',
        'image_url' => 'array',
];
}
