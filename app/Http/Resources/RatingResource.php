<?php

namespace App\Http\Resources;

use App\Models\Movie;
use App\Models\Rating;
use Illuminate\Http\Request;
use Workbench\App\Models\User;
use App\Http\Resources\MovieResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'movie_id' => $this->movie_id,
            'title' => $this->Movie->title,
            'user' => $this->user->name,
            'rating' => $this->rating,
            'review' => $this->review,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
     }

    }
