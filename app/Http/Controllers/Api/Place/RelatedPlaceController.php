<?php

namespace App\Http\Controllers\Api\Place;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlaceResource;
use App\Models\Place;
use Illuminate\Http\Request;

class RelatedPlaceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Place $place)
    {
        $relatedPlaces = $place->subDistrict->places()
        ->where('id','!=',$place->id)
        ->inRandomOrder()
        ->get()
        ->take(config('kuliner.related_place_limit'));

        return PlaceResource::collection($relatedPlaces);
    }
}
