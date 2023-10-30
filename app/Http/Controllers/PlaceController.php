<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $places = Place::with('subDistrict');

            return DataTables::of($places)
            ->addIndexColumn()
            ->addColumn('subDistrictName', function (Place $place) {
                return $place->subDistrict->name;
            })
            ->addColumn('place-menu', 'places.place-link')
            ->rawColumns(['place-menu'])
            ->addColumn('action', 'places.dt-action')
            ->toJson();

        }
        return view('places.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('places.create', [
            'subDistricts' => SubDistrict::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'description' => ['required'],
            'address' => ['required'],
            'phone' => ['required','numeric'],
            'image' =>  ['required','image'],
            'latitude' => ['required'],
            'longitude' => ['required'],

        ]);

        $image = null;

        if ($request->has('image')) {
            $image = $request->file('image')->store('images');
        }

        Place::create([
            'sub_district_id' => $request->sub_district_id,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $image,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        session()->flash('success', 'Berhasil tambah data tempat kuliner');

        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        return view('places.edit', [
            'subDistricts' => SubDistrict::get(),
            'place' => $place
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $this->validate($request, [
            'name' => ['required'],
            'description' => ['required'],
            'address' => ['required'],
            'phone' => ['required','numeric'],
            'latitude' => ['required'],
            'longitude' => ['required'],

        ]);

        $image = $place->image;

        if ($request->has('image')) {
            if (Storage::exists($place->image)) {
                Storage::delete($place->image);
            }

            $image = $request->file('image')->store('images');
        }

        $place->update([
            'sub_district_id' => $request->sub_district_id,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $image,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        session()->flash('success', 'Berhasil perbarui data tempat kuliner');

        return redirect()->route('places.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        if ($place->delete()) {

            session()->flash('error', 'Data dihapus');

            return response()->json([
                'success' => true
            ]);

            return response()->json([
                'success' => false
            ]);
        }
    }
}
