<?php

namespace App\Http\Controllers\Api\Menu;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use Illuminate\Http\Request;
use App\Models\Place;

class ListMenuController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Place $place)
    {
        $menus = $place->menus()->paginate(10);

        return MenuResource::collection($menus);
    }
}
