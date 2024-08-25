<?php

namespace App\Http\Resources;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * * @param  \Illuminate\Http\Request  $request
     *

     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'director' => $this->director,
            'genre' => $this->genre,
            'release_year' => $this->release_year,
            'description' => $this->description,
        //   'rating' => optional($this->Ratings)->rating,
          'rating' => RatingResource::collection($this->whenLoaded('rating')),
        //   'rating' => $this->rating->rating,

          // 'ratings' => RatingResource::collection($this->whenLoaded('rating')),

            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
