<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('sub-district.index');
    }
}
