<?php

namespace App\Http\Controllers\Api\SubDistrict;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlaceResource;
use App\Models\SubDistrict;
use Illuminate\Http\Request;

class ListPlaceBySubDistrictController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, SubDistrict $subDistrict)
    {
        $places = $subDistrict->places()->paginate(10);
        return PlaceResource::collection($places);
    }
}
