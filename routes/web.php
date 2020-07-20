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
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
} );

Route::get('/dashboard', 'OrdersController@getOrder')->name('dashboard');

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
})->where('vue_capture', '.*');

Route::redirect('/home', '/home/my-order-list');
//Router



// APi get clothing

Route::get('/clothing-lists', 'ClothingController@index');

//Get order of user
Route::get('/get-user-order/', 'OrdersController@getOrderOfUser');
Route::get('/get-user', 'OrdersController@getUser');

//Changer de mot de passe

Route::get('change-password','ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');