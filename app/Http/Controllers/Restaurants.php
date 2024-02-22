<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Restaurants;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurants::all();
        return view('', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'open_at' => [
                'required',
                'date_format:H:i',
                'before:close_at',
            ],
            'close_at' => [
                'required',
                'date_format:H:i',
            ],
        ]);

        Restaurants::create($validatedData);

        return redirect()->back()->with('success', 'Restaurant created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $restaurant = Restaurants::findOrFail($id);
        return view('restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'open_at' => [
                'required',
                'date_format:H:i',
                'before:close_at',
            ],
            'close_at' => [
                'required',
                'date_format:H:i',
                Rule::unique('restaurants')->ignore($id),
            ],
        ]);

        $restaurant = Restaurants::findOrFail($id);
        $restaurant->update($validatedData);

        return redirect()->back()->with('success', 'Restaurant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $restaurant = Restaurants::findOrFail($id);
        $restaurant->delete();

        return redirect()->back()->with('success', 'Restaurant deleted successfully');
    }
}
