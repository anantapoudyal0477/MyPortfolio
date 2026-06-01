<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = ['name', 'email', 'subject', 'message'];
    protected $casts = [
        'name'=>'encrypted',
        'email'=>'encrypted',
        'subject'=>'encrypted',
        'message'=>'encrypted'
    ];
}
