<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'courseColor',
        'professorColor',
        'backgroundColor',
        'buttonText',
        'buttonLink',
        'buttonColor',
        'shadow',
        'stars',
        'professor_id',
        'language_id',
    ];
}
