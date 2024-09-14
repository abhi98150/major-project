<?php
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\SellerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// home page route
Route::get('/', function () {
    return view('frontend.master');
});


// Route::view('/home','frontend.master')->name('home');



// php generated auth with command
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



//Custom Auth Routes
// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// login and register routes
Route::view('/login', 'customlogin.login2')->name('login');
Route::view('/test', 'backend.dashboard')->name('test');
Route::post('/login/check', 'AuthController@login')->name('login.check');
Route::view('/register', 'customlogin.register')->name('register');
Route::post('/register/store', 'AuthController@register')->name('register.store');

// users data display 
Route::get('/users','UsersController@index')->name('users.index')->middleware('auth');
Route::get('/users/create','UsersController@create')->name('users.create');
Route::post('/users/store','UsersController@store')->name('users.store');
Route::get('/users/delete/{id}','UsersController@delete')->name('users.delete');
Route::get('/users/edit/{id}','UsersController@edit')->name('users.edit');
Route::post('/users/update/{id}','UsersController@update')->name('users.update');



//product route
Route::get('/product','ProductController@index')->name('product.index');
Route::get('/product/create','ProductController@create')->name('product.create');
Route::post('/product/store','ProductController@store')->name('product.store');
Route::get('/product/delete/{id}','ProductController@delete')->name('product.delete');
Route::get('/product/edit/{id}','ProductController@edit')->name('product.edit');
Route::post('/product/update/{id}','ProductController@update')->name('product.update');

// routes/web.php




// Routes for User management
// Route::prefix('users')->group(function () {
//     Route::get('/', [UsersController::class, 'index'])->name('users.index')->middleware('auth');
//     Route::get('/create', [UsersController::class, 'create'])->name('users.create');
//     Route::post('/store', [UsersController::class, 'store'])->name('users.store');
//     Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');
//     Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
//     Route::post('/update/{id}', [UsersController::class, 'update'])->name('users.update');
// });

// // Routes for Seller management
// Route::prefix('sellers')->group(function () {
//     Route::get('/', [SellersController::class, 'index'])->name('sellers.index')->middleware('auth');
//     Route::get('/create', [SellersController::class, 'create'])->name('sellers.create');
//     Route::post('/store', [SellersController::class, 'store'])->name('sellers.store');
//     Route::get('/delete/{id}', [SellersController::class, 'delete'])->name('sellers.delete');
//     Route::get('/edit/{id}', [SellersController::class, 'edit'])->name('sellers.edit');
//     Route::post('/update/{id}', [SellersController::class, 'update'])->name('sellers.update');
// });
