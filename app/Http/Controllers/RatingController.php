<?php
namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Requests\RatingRequest;
use App\Http\Resources\RatingResource;
use App\Services\RatingService;

class RatingController extends Controller
{
    protected $ratingService;

    public function __construct(RatingService $ratingService)
    {
        $this->ratingService = $ratingService;
    }
  /**
     * @param Request $request
      *     @return RatingResource
      */
    public function index(Request $request)
    {
        $rating = $this->ratingService->getAllRatings();
        return RatingResource::collection($rating);
    }
    /**
        * create rating
    *  @param RatingRequest $request
     * @return RatingResource
     */
    public function store(RatingRequest $request)
    {
        $rating = $this->ratingService->createRating($request->validated());
        return new RatingResource($rating);
    }
  /**
        * show rating use id
    *  @param $id
     * @return RatingResource
     */
    public function show($id)
    {
        $rating = $this->ratingService->getRatingById($id);
        return new RatingResource($rating);
    }

    /**
        * ubdate rating use id
    *  @param $id
    *  @param RatingRequest $request
     * @return RatingResource
     */
    public function update(RatingRequest $request, $id)
    {
        $rating = $this->ratingService->updateRating($id, $request->validated());
        return new RatingResource($rating);
    }
/**
        * delete rating use id
    *  @param $id

     * @return ratingService->deleteRating
     */
    public function destroy($id)
    {
        $deleterating=$this->ratingService->deleteRating($id);
        return $deleterating;
    }
}
