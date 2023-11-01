<?php

namespace App\Http\Controllers\Api\Place;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Http\Resources\PlaceResource;

class SearchPlaceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $places = Place::searchPlace($request->keyword)
        ->paginate(5);
        return PlaceResource::collection($places);
    }
}
