<?php

namespace App\Http\Controllers;

use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubDistrictController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $subDistricts = SubDistrict::query();

            return DataTables::of($subDistricts)->toJson();
        }
        return view('sub-district.index');
    }
}
