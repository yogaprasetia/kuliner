<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlaceResource;
use Illuminate\Http\Request;

class ListFavouritePlaceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $places = $request->user()->places()->paginate(10);

        return PlaceResource::collection($places);
    }
}
