<?php

//use App\Mail\LaravelMail;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
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


Route::prefix('subscriptions')->name('subscriptions.')->group(function () {
    Route::get('/', [SubscriptionController::class, 'show'])->name('show');
    Route::get('/add', [SubscriptionController::class, 'create'])->name('create');
    Route::post('/add', [SubscriptionController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [SubscriptionController::class, 'edit'])->name('edit');
    Route::post('/edit', [SubscriptionController::class, 'update'])->name('update');
});


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

//gestion des roles
Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('/owner-dashboard', function () {
        return view('owner_dashboard'); 
    })->name('Ownerdashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin-dashboard', [AdminController::class, 'index'] )->name('Admin');
    //add operatuer
    Route::get('/ajouter operateur', [AdminController::class, 'create'] )->name('operateur');
    Route::post('/store',[AdminController::class, 'store'])->name('Store');
    //add subAdmin
    Route::get('/ajouter SubAdmin', [AdminController::class, 'createSubadmin'] )->name('subAdmin');
    Route::post('/AddSubAdmin',[AdminController::class, 'AddSubAdmin'])->name('AddSubAdmin');
    //delete 
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('user.destroy');
    //Mail::to('mohmmedleah81@gmail.com')
    //->send(new LaravelMail());
});

//Route::get('/owner_dashboard', [OwnerController::class,'index'])->name('owner_dashboard');

 //gestion email


//login & regster github google
Route::get('/auth/{provider}/redirect',[SocialiteController::class, 'redirect']);
 
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback']);


require __DIR__.'/auth.php';