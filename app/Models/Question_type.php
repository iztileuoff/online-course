<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    
    public function media()
    {
        return $this->morphOne(Media::class, 'mediable');
    }
}
