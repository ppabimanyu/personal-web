<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'greeting_text',
        'bio',
        'image_path',
        'linkedin_url',
        'github_url',
        'resume_path',
    ];
}
