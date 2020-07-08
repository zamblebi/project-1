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



//Modification des cooordonnees de l'utilisateur
Route::get('/cooordonnees/{id}', 'UserController@edit')->name('cooordonnees');
Route::post('update/{id}', 'UserController@update');

//Order
Route::get('/order', 'OrdersController@index')->name('order');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
