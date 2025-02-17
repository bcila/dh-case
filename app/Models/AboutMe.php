<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    protected $table = 'about_me';

    protected $fillable = [
        'biography',
        'hobbies',
        'phobias'
    ];

    protected $casts = [
        'hobbies' => 'array',
        'phobias' => 'array',
    ];
}
