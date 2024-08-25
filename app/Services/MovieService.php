<?php

namespace App\Services;

use App\Models\Movie;

class MovieService
{
/**
      * Create a new movie.
    * @param array $data
    * @return \App\Models\Movie

    */
    public function createMovie($data)
    {
        return Movie::create($data);
    }
  /**
     * Update an existing movie.
     * @param $id
     * @param array $data
     * @return \App\Models\Movie
     */
    public function updateMovie( $id,$data)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($data);
        return $movie;
    }
 /**
     * Delete an existing movie.
     * @param \App\Models\Movie $movie
     *  @return \App\Models\Movie
     */
    public function deleteMovie($id)
    {
        $movie = Movie::findOrFail($id);

        $movie->delete();
        return response()->json("تم الحذف بنجاح", 204);



    }
}
