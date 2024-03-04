<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Models\Owner;
use App\Models\Restaurants;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        if ($user->owner && $user->owner->restaurant_id !== null) {
            return redirect()->back()->with('error', 'User can only add one restaurant.');
        }

        else {$validatedData = $request->validate([
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
        $restaurant = Restaurants::create($validatedData);
        
        $user->owner->update([
            'restaurant_id' => $restaurant->id,
        ]);
      
      return view('owner_dashboard')->with('success', 'Restaurant created successfully');
    }
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
    {dd($id);
        $restaurant = Restaurants::findOrFail($id);
        return view('owner_dashboard', compact('restaurant'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    
        $restaurant = Restaurants::findOrFail($id);
    $restaurant->update($request->all());

    return view('owner_dashboard')->with('success', 'Restaurant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


    $restaurant = Restaurants::findOrFail($id);
    $restaurant->delete();

    return redirect()->route('owner_dashboard')->with('success', 'Restaurant deleted successfully');


    }
}
