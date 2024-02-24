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
    
        $user = User::updateOrCreate([
            'id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
            'password' => bcrypt('default'),
        ]);
    
        //dd($githubUser);
    
        auth()->login($user);
    
        return redirect('/dashboard');
    }
    
}