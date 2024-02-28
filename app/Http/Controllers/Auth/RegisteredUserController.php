<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Owner;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
  
     public function store(Request $request): RedirectResponse
     {
         $request->validate([
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
             'password' => ['required', 'confirmed', Rules\Password::defaults()],
         ]);
 
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        //$owner = owner::create([
          //  'user_id' => $user->id,
           
        //]);
        
        //dd($owner);
            $user->assignRole('owner');
        
      
         
         event(new Registered($user));
 
         Auth::loginUsingId($user->id);
 
         return redirect(RouteServiceProvider::HOME);
     }
}
