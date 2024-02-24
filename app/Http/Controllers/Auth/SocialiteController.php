<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect($Socialite)
    {
       return Socialite::driver('github')->redirect();
     

    }

    public function callback($Socialite){
        $githubUser = Socialite::driver('github')->user();

        $existingUser = User::where('email', $githubUser->email)->first();

        if ($existingUser) {
            auth()->login($existingUser);
            return redirect('/dashboard');
        }
        $user = User::updateOrCreate([
            'id' => (int) $githubUser->id,
            'Socialite'=>$Socialite,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'Socialite_token' => $githubUser->token,
        ]);
    
        //dd($githubUser);
    
        auth()->login($user);
    
        return redirect('/dashboard');
    }
   
}