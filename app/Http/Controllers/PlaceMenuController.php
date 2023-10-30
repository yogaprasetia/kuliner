<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
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
            ->editColumn('image', function ($menu) {
                return '<img src="'. $menu->image_url .'">';
            })
            ->addColumn('action', 'places.menus.dt-action')
            ->rawColumns(['image','action'])
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
            'place' => $place,
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

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images/menus');
        }

        $place->menus()->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $image,
            'price' => $request->price,
        ]);

        return redirect()->route('menu.index', $place);
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
