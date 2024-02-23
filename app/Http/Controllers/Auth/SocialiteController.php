<?php

namespace App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    public function redirect($Socialite)
    {
        return Socialite::driver($Socialite)->redirect();

    }

    public function callback(){
        $user = Socialite::driver($Socialite)->user();
        dd( $user);

    }
}
