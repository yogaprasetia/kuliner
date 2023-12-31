<?php

namespace App\Http\Controllers\Api\Place;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Http\Resources\PlaceResource;

class ListPlaceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $places = Place::query();

        if ($request->has('keyword')) {
            $places->searchPlace($request->keyword);
        }

        return PlaceResource::collection($places->paginate(5));
    }
}
