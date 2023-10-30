<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Place;

class PlaceMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Place $place)
    {
        if ($request->ajax()) {
            $menus = $place->menus;

            return DataTables::of($menus)
            ->addIndexColumn()
            ->addColumn('action', 'places.menus.dt-action')
            ->toJson();
        }
        return view('places.menus.index', [
            'place' => $place,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Place $place)
    {
        return view('places.menus.create', [
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Place $place)
    {
        $this->validate($request, [
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'price' => ['required','numeric'],

        ]);

        $image = null;

        if ($request->has('image')) {
            $image = $request->file('image')->store('images/menus');
        }

        $place->menus()->create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
        ]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
