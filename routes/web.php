<?php

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
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'IndexController@index');

Auth::routes();


Route::get('/userpanel', 'admin\UserController@userPanel')->name('userpanel');
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('admin/product/gallery', 'admin\ProductController@gallery');
Route::post('admin/product/upload', 'admin\ProductController@upload');
// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','UserLevel', 'isVerified']],function(){
  Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['namespace'=>'admin','middleware'=>['auth','isVerified','UserLevel'],'prefix'=>'/admin'],function(){
  Route::resource('/product', 'ProductController');
  Route::resource('/role', 'RoleController');
  Route::resource('/user', 'UserController');
  Route::resource('/permission', 'PermissionController');
  Route::resource('/category', 'CategoryController');
  Route::resource('/brand', 'BrandController');
  Route::resource('/slider', 'SliderController');
  Route::resource('/filter', 'FilterController');
  Route::resource('/sliderparent', 'Slider_parentController');
});


//Client Routes
Route::resource('/category', 'CategoryController');

Route::group([],function(){
  Route::resource('/product/store', 'BasketController');
  Route::get('/basket', 'BasketController@index')->middleware('auth');
});
