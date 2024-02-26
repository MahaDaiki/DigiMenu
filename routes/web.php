<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\googelSocialiteController;
use App\Http\Controllers\SubscriptionController;
use App\Mail\UserMail;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/subscriptions', [SubscriptionController::class, 'show'])->name('subscriptions.show');
Route::get('/add_subscription', [SubscriptionController::class, 'create'])->name('subscriptions.create');
Route::post('/add_subscription', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::get('/edit_subscription/{id}', [SubscriptionController::class, 'edit'])->name('subscriptions.edit');
Route::post('/edit_subscription', [SubscriptionController::class, 'update'])->name('subscriptions.update');

Route::get('email_test', function() {
    // $mailer = new UserMail();
    // $user = Auth::user();
    // dd($user->email);
    Mail::to('laksoumi.ot@gmail.com')->send(new UserMail());
    // return view($mailer->content()->view);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/owner_dashboard', [OwnerController::class,'index'])->name('owner_dashboard');

 
Route::get('/auth/{Socialite}/redirect',[SocialiteController::class, 'redirect']);
 
Route::get('/auth/{Socialite}/callback', [SocialiteController::class, 'callback']);

Route::get('/auth/{Socialite}/redirect',[googelSocialiteController::class, 'redirect']);
 
Route::get('/auth/{Socialite}/callback', [googelSocialiteController::class, 'callback']);
require __DIR__.'/auth.php';