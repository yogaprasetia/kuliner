<?php

namespace App\Http\Controllers\Api\Place;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlaceResource;
use Illuminate\Http\Request;
use App\Models\Place;

class ShowPlaceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Place $place)
    {
        return new PlaceResource($place);
    }
}
