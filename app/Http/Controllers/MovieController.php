<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Services\MovieService;
use App\Http\Requests\MovieRequest;
use App\Http\Resources\MovieResource;

class MovieController extends Controller
{


    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    /**
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $query = Movie::query();

        if ($request->has('genre')) {
            $query->where('genre', $request->input('genre'));
        }

        if ($request->has('director')) {
            $query->where('director', $request->input('director'));
        }
        if ($request->has('sort_by_release_year')) {
            $sortDirection = $request->input('sort_direction', 'asc'); 
            $query->orderBy('release_year', $sortDirection);
        }

        // 3. Pagination
        $perPage = $request->input('per_page', 10);
        $movies =  $query->with('rating')->paginate($perPage);

        //  MovieResource
        return MovieResource::collection($movies);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MovieRequest $request)
    {
        try {

            $movie = $this->movieService->createMovie($request->validated());
            return new MovieResource($movie);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to create movie'], 500);
        }
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->load('rating');

        return new MovieResource($movie);
    }


    /**
     * Update the specified resource in storage.
     * @param MovieRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

     public function update(MovieRequest $request, $id)
     {
        try {
            $movie = $this->movieService->updateMovie($id, $request->validated());

            return new MovieResource($movie);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Unable to update movie'], 500);
        }


     }

    /**
     * Remove the specified resource from storage.
     * @param $di
     * @return movieService->deleteMovie
     */


    public function destroy($id)
{
    $deletemovie = $this->movieService->deleteMovie($id);

    return $deletemovie;

}



}
