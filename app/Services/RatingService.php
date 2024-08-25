<?php
namespace App\Services;

use App\Models\Rating;
use App\Models\User;

class RatingService
{
    /**
     * @param Rating
     * @return rating
     */
    public function getAllRatings()
    {
        $Rating = Rating::all();
        return $Rating;
    }
/**
 * @param $id
 * return rating
 *
 */
    public function getRatingById($id)
    {
        $Rating = Rating::findOrFail($id);
        return $Rating;
    }

    /**
     * @param $data
     * @return rating
     */
    public function createRating(array $data)
    {

        return Rating::create($data);
    }
    /**
     * @param $id
    *  @param $data
     * @return rating
     */
    public function updateRating($id, array $data)
    {
        $rating = Rating::findOrFail($id);
        $rating->update($data);
        return $rating;
    }
  /**
     * @param $id
     * @return rating
     */
    public function deleteRating($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();
        return response()->json("تم الحذف بنجاح", 204);
    }
}
