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
use Spatie\Permission\Traits\HasRoles;
use App\Providers\RouteServiceProvider;
use Illuminate\Notifications\Notifiable;

class RegisteredUserController extends Controller
{
    use Notifiable ,HasRoles;
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
            $user->assignRole('owner');
        
         event(new Registered($user));
 
         Auth::loginUsingId($user->id);
 
         return redirect(RouteServiceProvider::HOME);
     }
}
