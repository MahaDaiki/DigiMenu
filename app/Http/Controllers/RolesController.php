<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function showDashboard()
    {
        $user = Auth::user();

        if ($user->hasRole('owner')) {
            return redirect()->route('owner.dashboard');
        } 
        elseif ($user->hasRole('opperateur')) {
            return redirect()->route('opperateur.dashboard');
        }
        else {
            
            abort(403, 'Unauthorized');
        }
    }
}
