<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $casts = [
        'services' => 'array',
        'experience' => 'array',
        'education' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'description',
        'about',
        'profile_image',
        'cover_image',
        'services',
        'experience',
        'education',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}