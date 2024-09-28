<?php


## we define our routes here
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     ## uses dot notation to navigate tro directories
//     return view('posts.index');
// })->name('home');

Route::redirect('/','posts');

//creates routes for the posts controller resource automatically
Route::resource('posts',postController::class);


Route::get('/{users}/posts',[DashboardController::class,'usersPosts'])->name('posts.users');

//auth middleware - only the authenticated users can access
Route::middleware('auth')->group(function(){
//Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

});


//grouped all the routes with the guest middleware
Route::middleware('guest')->group(function(){
    // Suggested code may be subject to a license. Learn more: ~LicenseLog:3868919917.
Route::view('/register','auth.register')->name('register');

Route::post('/register',[AuthController::class, 'register']);


Route::view('/login','auth.login')->name('login');
Route::post('/login',[AuthController::class, 'login']);
});


