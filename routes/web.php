<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => ['auth', 'admin']] , function() {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });
} );

//Clothing
Route::get('/dashboard/clothing', 'ClothingController@create');
//Add clothing
Route::post('/dashboard/clothing/add-clothing', 'ClothingController@store')->name('add-clothing');
//Delete clothing
Route::post('/dashboard/clothing/detete-clothing/{id}', 'ClothingController@destroy')->name('delete-clothing');
//Edit clothing
Route::get('/dashboard/clothing/edit-clothing/{id}', 'ClothingController@edit')->name('edit-clothing');
//Update clothing
Route::post('/dashboard/clothing/update-clothing/{id}', 'ClothingController@update')->name('update-clothing');


//Modification des cooordonnees de l'utilisateur
Route::get('/cooordonnees/{id}', 'UserController@edit')->name('cooordonnees');
Route::post('update/{id}', 'UserController@update');

//Order
Route::get('/order', 'OrdersController@index')->name('new-order');

//Add to cart
Route::get('/add-to-cart/{id}', 'ClothingController@addToCart')->name('cart');
//Delete Cart
Route::get('/delete-on-cart/{id}', 'ClothingController@deleteOnCart')->name('delete.cart');
//Delivery Choice
Route::get('/delivery-choice', 'OrdersController@deliveryChoice')->name('delivery.choice');
Route::get('/add-delivery-simple/', 'OrdersController@addDeliverySimple')->name('add.delivery.simple');
Route::get('/add-delivery-express/', 'OrdersController@addDeliveryExpress')->name('add.delivery.express');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');






// APi get clothing

Route::get('/clothing-lists', 'ClothingController@index');