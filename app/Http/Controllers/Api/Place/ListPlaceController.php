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
            $places->where('name','like','%' . $request->keyword . '%')
            ->orWhere('description','like','%' . $request->keyword . '%')
            ->orWhere('address','like','%' . $request->keyword . '%')
            ->orWhereHas('subDistrict', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->keyword . '%');
            });
        }

        return PlaceResource::collection($places->paginate(5));
    }
}
