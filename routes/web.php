<?php

//use App\Mail\LaravelMail;
//use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\googelSocialiteController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\SubscriptionController;
use App\Mail\UserMail;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;




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
Route::post('/menu/create', [MenusController::class, 'createMenu'])->name('menu.create');

Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('/owner_dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');

Route::get('/MenuManage/{id}', [ArticleController::class, 'index'])->name('menu.manage');
Route::post('/menuManage/{menu_id}/add-article', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/{article}/edit', [ArticleController::class,'edit' ])->name('articles.edit');
Route::put('articles/{article}', [ArticleController::class ,'update'])->name('articles.update');
Route::get('articles/{article}/delete', [ArticleController::class ,'delete'])->name('articles.delete');
Route::delete('articles/{article}', [ArticleController::class ,'destroy'])->name('articles.destroy');



Route::post('/restaurants', [RestaurantsController::class, 'store'])->name('restaurants.store');
Route::resource('restaurants', RestaurantsController::class);
Route::put('/restaurants/{id}', [RestaurantsController::class, 'update'])->name('restaurants.update');
Route::delete('/restaurants/{id}', [RestaurantsController::class , 'destroy'])->name('restaurants.destroy');
Route::post('/menu/create', [MenusController::class, 'createMenu'])->name('menu.create');

});
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin-dashboard', [AdminController::class, 'index'] )->name('Admin');
    //add operatuer
    Route::get('/ajouter operateur', [AdminController::class, 'create'] )->name('operateur');
    Route::post('/store',[AdminController::class, 'store'])->name('Store');
    //add subAdmin
    Route::get('/ajouter SubAdmin', [AdminController::class, 'create'] )->name('subAdmin');
    Route::post('/AddSubAdmin',[AdminController::class, 'AddSubAdmin'])->name('AddSubAdmin');
    //delete 
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('user.destroy');
    //Mail::to('mohmmedleah81@gmail.com')
    //->send(new LaravelMail());
});
//Route::middleware(['auth', 'role:sub_admin'])->group(function () {

    Route::get('/admin-dashboard', [AdminController::class, 'index'] )->name('Admin');
    //add operatuer
    Route::get('/ajouter operateur', [AdminController::class, 'create'] )->name('operateur');
    Route::post('/store',[AdminController::class, 'store'])->name('Store');
    //add subAdmin
    Route::get('/ajouter SubAdmin', [AdminController::class, 'create'] )->name('subAdmin');
    Route::post('/AddSubAdmin',[AdminController::class, 'AddSubAdmin'])->name('AddSubAdmin');
    //delete 
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('user.destroy');
    //Mail::to('mohmmedleah81@gmail.com')
    //->send(new LaravelMail());
//});
//Route::get('/owner_dashboard', [OwnerController::class,'index'])->name('owner_dashboard');



//login & regster github google
Route::get('/auth/{provider}/redirect',[SocialiteController::class, 'redirect']);
 
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback']);


require __DIR__.'/auth.php';