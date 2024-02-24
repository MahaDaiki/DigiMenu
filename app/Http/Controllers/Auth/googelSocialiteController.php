<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class googelSocialiteController extends Controller
{
    public function redirect($Socialite)
{
    return Socialite::driver('google')->redirect();
}

public function callback($Socialite)
{
    $googleUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate([
        'id' => $googleUser->id,
    ], [
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'google_token' => $googleUser->token,
        'google_refresh_token' => $googleUser->refreshToken,
        'password' => bcrypt('default'),
    ]);

    auth()->login($user);

    return redirect('/dashboard');
}
}
