<?php

namespace App\Models;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'movie_id',
        'rating',
        'review',

    ];



public function user()
{
    return $this->belongsTo(User::class);
}
public function Movie()
{
    return $this->belongsTo(Movie::class);
}
}
