<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class StoreFavouritePlaceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Place $place)
    {
        $user = $request->user();
        if ($user->places()->wherePivot('place_id', $place->id)->exists()) {
            return response()->json([
                'message' => 'place has already in your favorite lists.'
            ],201);
        }

        $user->places()->attach($place->id);
        return response()->json([
            'message' => 'place added to favourite.'
        ],201);

    }
}
