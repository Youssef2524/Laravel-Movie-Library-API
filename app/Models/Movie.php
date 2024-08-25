<?php

namespace App\Models;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'director',
        'genre',
        'release_year',
        'description',
    ];

    
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

}
