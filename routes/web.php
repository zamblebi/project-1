<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
});

//Admin dashboard
Route::middleware('auth','admin')->group(function() {
    Route::get('/dashboard', 'AdminController@index');
});



if(Auth::check())
{
    
}
// Route::get('/dashboard', function(){
//     return view('admin.dashboard');
// });
// Route::get('/dashboard')->middleware('auth');

Route::get('/dashboard', 'OrdersController@getOrder')->name('dashboard')->middleware('auth');

//Clothing
Route::get('/dashboard/clothing', 'ClothingController@create')->middleware("auth");
//Add clothing
Route::post('/dashboard/clothing/add-clothing', 'ClothingController@store')->middleware("auth")->name('add-clothing');
//Delete clothing
Route::post('/dashboard/clothing/detete-clothing/{id}', 'ClothingController@destroy')->middleware("auth")->name('delete-clothing');
//Edit clothing
Route::get('/dashboard/clothing/edit-clothing/{id}', 'ClothingController@edit')->middleware("auth")->name('edit-clothing');
//Update clothing
Route::post('/dashboard/clothing/update-clothing/{id}', 'ClothingController@update')->middleware("auth")->name('update-clothing');


//Modification des cooordonnees de l'utilisateur
Route::get('/cooordonnees/{id}', 'UserController@edit')->name('cooordonnees');
Route::post('update/{id}', 'UserController@update');

//Order
//Route::get('/order', 'OrdersController@index')->name('new-order');
Route::get('/order{opt?}', function (){
    return view("orders.index");
})->where('opt', '.*');

// Store Order
Route::post('/order/commander', 'OrdersController@store');
Route::get('/order/commander', 'OrdersController@getUser');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//
Route::get('/home/{vue_capture?}', function(){
    return view('home');
})->middleware('auth')->where('vue_capture', '.*');

Route::redirect('/home', '/home/my-order-list')->middleware('auth');
//Router->middle



// APi get clothing
Route::get('/clothing-lists', 'ClothingController@index');

//Api category
Route::get('/category-lists', 'ClothingController@categoryList');

//Get order of user
Route::get('/get-user-order/', 'OrdersController@getOrderOfUser');
Route::get('/get-user', 'OrdersController@getUser');

//Changer de mot de passe

Route::get('change-password','ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');



//Category
Route::get('dashboard/category', 'CategoryController@create')->name('category');

//add new category
Route::post('dashboard/category/add', 'CategoryController@store')->name('add-category');

//remove category
Route::post('dashboard/category/remove/{id}', 'CategoryController@destroy')->name('remove-category');

//edit category
Route::get('dashboard/category/edit/{id}', 'CategoryController@edit')->name('edit-category');

//Update
Route::post('dashboard/category/update/{id}', 'CategoryController@update')->name('update-category');

//Order checked
Route::post('dashboard/checked/{id}', 'OrdersController@checked')->name('order.checked');



//Send Notification
Route::get('send', "OrdersController@sendNotification");