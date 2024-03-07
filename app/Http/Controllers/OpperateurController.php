<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpperateurController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $restaurants = $user->opperateur->restaurant;
        $id = $user->owner->restaurant_id;
        $menu = Menus::where('restaurant_id', $id)->get(); 
       
        return view('owner_dashboard', compact('restaurants','menu'));
       
    }
}
