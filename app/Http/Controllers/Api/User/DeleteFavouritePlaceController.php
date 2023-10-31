<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;

class DeleteFavouritePlaceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Place $place)
    {
        
        if ($request->user()->places()->wherePivot('place_id', $place->id)->exists()) {
            $request->user()->places()->detach($place);

            return response()->json([
                'message' => 'Success deleted favourite place.'
            ]);
        }

        return response()->json([
            'message' => 'This place is not in your favourite lists.'
        ]);
    }
}
