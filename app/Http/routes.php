<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
//Route::get('home', 'HomeController@index');

//////////////////////////////////////////////////////////////////
Route::get('activation/{actkey}/{uid}', 'MembersController@activation');
Route::get('members', 'MembersController@index');
Route::post('members/search', 'MembersController@search');
Route::get('members/search', 'MembersController@search');
Route::get('members/edit/{id}', 'MembersController@getedit');
Route::get('members/profile/', 'MembersController@getedit');
Route::get('members/password/{id}', 'MembersController@getpassword');
Route::post('members/update', 'MembersController@postupdate');
Route::post('members/updatepassword', 'MembersController@postupdatepassword');
Route::get('members/events/{id?}', 'MembersController@getmemberevents');
//////////////////////////////////////////////////////////////////////////////////////
/**
/* Routes for blog
*/
Route::get('blog','BlogController@index');
Route::get('blog/index','BlogController@index');
Route::get('myblogs','BlogController@myBlogs');
Route::get('blog/create','BlogController@create');
Route::post('blog/store',['as' => 'blog/store', 'uses' => 'BlogController@store']);
Route::get('blog/show/{id}','BlogController@show');
Route::post('blog/show',['as' => 'blog/show', 'uses' => 'BlogController@show']);
Route::get('blog/edit/{id}','BlogController@edit');
Route::post('blog/update',['as' => 'blog/update', 'uses' => 'BlogController@update']);
Route::get('blog/delete/{id}','BlogController@delete');
Route::post('blog/destroy',['as' => 'blog/destroy', 'uses' => 'BlogController@destroy']);

//////////////////////////////////////////////////////////////////////////////////////
/**
/* Routes for settings
*/
Route::get('settings','SettingsController@index');
Route::get('settings/index','SettingsController@index');
Route::get('settings/edit/{id}','SettingsController@edit');
Route::post('settings/update',['as' => 'settings/update', 'uses' => 'SettingsController@update']);


Route::get('/logout', function()
{
    Auth::logout();
    Session::flush();
    return Redirect::to('/');
})->before('auth.basic');


//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',        
]);


Route::post('resetpassword',[
    'as'=> 'resetpassword',
    'uses' => 'Auth\PasswordController@resetPasswordFinal'
]);


Route::get('/resetpassword/{token}','Auth\PasswordController@resetpassword');

/**
/* Routes for categories
*/
Route::get('categories','CategoriesController@index');
Route::get('categories/index','CategoriesController@index');
Route::get('categories/create','CategoriesController@create');
Route::post('categories/store',['as' => 'categories/store', 'uses' => 'CategoriesController@store']);
Route::get('categories/show/{id}','CategoriesController@show');
Route::post('categories/show',['as' => 'categories/show', 'uses' => 'CategoriesController@show']);
Route::get('categories/edit/{id}','CategoriesController@edit');
Route::post('categories/update',['as' => 'categories/update', 'uses' => 'CategoriesController@update']);
Route::get('categories/delete/{id}','CategoriesController@delete');
Route::post('categories/destroy',['as' => 'categories/destroy', 'uses' => 'CategoriesController@destroy']);