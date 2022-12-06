<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Quiz extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'attempt',
        'duration',
        'min_score',
    ];

    protected $casts = [
        'duration' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
