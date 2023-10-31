<?php

namespace App\Http\Controllers\Api\Menu;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Menu;

class ShowMenuController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Place $place, Menu $menu)
    {
        return new MenuResource($menu);
    }
}
