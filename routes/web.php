<?php
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\SellerController;
use App\Http\Controllers\RegisterController;
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


// Route::get('/test1', [RegisterController::class, 'testMethod']);

// login and register routes
Route::view('/login', 'customlogin.login_user')->name('login');
// Route::view('/login/vendor', 'customlogin.login_vendor')->name('login_vendor');
// Route::view('/login', 'customlogin.login_vendor')->name('login_vendor');
// routes/web.php

Route::get('/vendor/login', function () {
    return view('customlogin.login_vendor'); // Replace 'vendor.login' with the view name for vendor login
})->name('vendor.login');

// Route::view('/test', 'backend.dashboard')->name('test');
Route::post('/login/check', 'AuthController@login')->name('login.check');

Route::post('/login/check/vendor', 'VendorController@login')->name('login.check_vendor');

// Route::get('/register', function () {
//     return view('customlogin.register_user');
// })->name('register.user');

// Route::view('/register','customlogin.register_user')->name('user.reg');
Route::get('/register-user', function () {
    return view('customlogin.register_user'); // Adjust view path if necessary
})->name('user.register');



Route::view('/register', 'customlogin.register_vendor')->name('vendor.register');
Route::view('/vendor/dashboard', 'vendor.dashboard')->name('vendor.dashboard')->middleware('vendor');
Route::view('/register/user', 'customlogin.register_user')->name('user.register');

Route::post('/register/store', 'AuthController@register')->name('register.store');
// Route::post('/register/store', 'AuthController@register')->name('register_user.store');

Route::post('/register/store', 'VendorController@register')->name('register_vendor.store');

// Route to handle registration form submission
Route::post('/register/user', 'UsersController@register')->name('register_user.store');

Route::POST('/vendor/logout', 'VendorController@logout')->name('vendor.logout');


// Route::post('/register/vendor', 'VendorController@register')->name('vendor.register');

// users data display 
// Route::get('/users','UsersController@index')->name('users.index')->middleware('auth');
// Route::get('/users/create','UsersController@create')->name('users.create');
// Route::post('/users/store','UsersController@store')->name('users.store');
// Route::get('/users/delete/{id}','UsersController@delete')->name('users.delete');
// Route::get('/users/edit/{id}','UsersController@edit')->name('users.edit');
// Route::post('/users/update/{id}','UsersController@update')->name('users.update');



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




// Sitesettings routes..............................................!!
// Route::get('/backend','SiteSettingController@index')->name('backend.index')->middleware('auth');
// Route::get('/backend/create','SiteSettingController@create')->name('backend.create')->middleware('auth');
// Route::post('/backend/store','SiteSettingController@store')->name('backend.store')->middleware('auth');
// Route::get('/backend/delete/{id}','SiteSettingController@delete')->name('backend.delete')->middleware('auth');
// Route::get('/backend/edit/{id}','SiteSettingController@edit')->name('backend.edit')->middleware('auth');
// Route::post('/backend/update/{id}','SiteSettingController@update')->name('backend.update')->middleware('auth');


// for order......................................!!
// Route::get('/orders','OrderController@index')->name('orders.index')->middleware('auth');
// Route::get('/orders/delete/{id}','OrderController@delete')->name('orders.delete')->middleware('auth');
// Route::get('/orders/edit/{id}','OrderController@edit')->name('orders.edit')->middleware('auth');
// Route::post('/orders/update/{id}','OrderController@update')->name('orders.update')->middleware('auth');



// for Payments......................................!!
// Route::get('/payments','PaymentController@index')->name('payments.index')->middleware('auth');
// Route::get('/payments/delete/{id}','PaymentController@delete')->name('payments.delete')->middleware('auth');
// Route::get('/payments/edit/{id}','PaymentController@edit')->name('payments.edit')->middleware('auth');
// Route::post('/payments/update/{id}','PaymentController@update')->name('payments.update')->middleware('auth');




// for Details......................................!!
// Route::get('/details','DetailsController@index')->name('details.index')->middleware('auth');
// Route::get('/details/delete/{id}','DetailsController@delete')->name('details.delete')->middleware('auth');
// Route::get('/details/edit/{id}','DetailsController@edit')->name('details.edit')->middleware('auth');
// Route::post('/details/update/{id}','DetailsController@update')->name('details.update')->middleware('auth');



// for wishlists......................................!!
// Route::get('/wishlists','WishlistsController@index')->name('wishlists.index')->middleware('auth');
// Route::get('/wishlists/delete/{id}','WishlistsController@delete')->name('wishlists.delete')->middleware('auth');
// Route::get('/wishlists/edit/{id}','WishlistsController@edit')->name('wishlists.edit')->middleware('auth');
// Route::post('/wishlists/update/{id}','WishlistsController@update')->name('wishlists.update')->middleware('auth');

// for cart......................................!!
// Route::get('/carts','CartsController@index')->name('carts.index')->middleware('auth');
// Route::get('/carts/delete/{id}','CartsController@delete')->name('carts.delete')->middleware('auth');
// Route::get('/carts/edit/{id}','CartsController@edit')->name('carts.edit')->middleware('auth');
// Route::post('/carts/update/{id}','CartsController@update')->name('carts.update')->middleware('auth');

// for cart_details......................................!!
// Route::get('/carts_details','Carts_detailsController@index')->name('carts_details.index')->middleware('auth');
// Route::get('/carts_details/delete/{id}','Carts_detailsController@delete')->name('carts_details.delete')->middleware('auth');
// Route::get('/carts_details/edit/{id}','Carts_detailsController@edit')->name('carts_details.edit')->middleware('auth');
// Route::post('/carts_details/update/{id}','Carts_detailsController@update')->name('carts_details.update')->middleware('auth');


// for category..........................!!
// Route::get('/category','CategoryController@index')->name('category.index')->middleware('auth');
// Route::get('/category/delete/{id}','CategoryController@delete')->name('category.delete')->middleware('auth');
// Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit')->middleware('auth');
// Route::post('/category/update/{id}','CategoryController@update')->name('category.update')->middleware('auth');






// for Products I absent in this class this class day......................................!!
// Route::get('/products','ProductController@index')->name('products.index'); //->middleware('auth');
// Route::get('/products/create','ProductController@create')->name('products.create');
// Route::post('/products/store','ProductController@store')->name('products.store');
// Route::get('/products/delete/{id}','ProductController@delete')->name('products.delete');
// Route::get('/products/edit/{id}','ProductController@edit')->name('products.edit');
// Route::post('/products/update/{id}','ProductController@update')->name('products.update');
