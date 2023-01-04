<?php

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


Route::get('/dashboard', function () {
    return view('insert.dashboard');
});

Route::get('/','App\Http\Controllers\frontController@index');
Route::get('/admin','App\Http\Controllers\adminController@admin');
Route::get('/setup','App\Http\Controllers\adminController@setup');
Route::get('/categories','App\Http\Controllers\adminController@categories');
Route::get('/new-post','App\Http\Controllers\adminController@newpost');
Route::get('/all-posts','App\Http\Controllers\adminController@allposts');

//services
Route::get('/new-service','App\Http\Controllers\adminController@newservice');
Route::get('/all-services','App\Http\Controllers\adminController@allservices');
Route::get('/editSE/{id}','App\Http\Controllers\adminController@editService');
Route::post('/updateSE/{id}','App\Http\Controllers\crudController@updateData');
Route::get('/deleteSE/{id}','App\Http\Controllers\adminController@deleteSE');

//portfolios
Route::get('/portcats','App\Http\Controllers\adminController@portcats');
Route::post('/addPc','App\Http\Controllers\crudController@insertData');
Route::get('/new-portfolio','App\Http\Controllers\adminController@portfolio');
Route::post('/addPortfolio','App\Http\Controllers\crudController@insertData');

//clients
Route::get('/clientall','App\Http\Controllers\adminController@clientall');
Route::post('/addClient','App\Http\Controllers\crudController@insertData');

Route::post('/addSettings','App\Http\Controllers\crudController@insertData');
Route::post('/addCategory','App\Http\Controllers\crudController@insertData');
Route::post('/addPost','App\Http\Controllers\crudController@insertData');



//posts
Route::get('/editPost/{id}','App\Http\Controllers\adminController@editPost');
Route::post('/updatePost/{id}','App\Http\Controllers\crudController@updateData');
Route::get('/deletePost/{id}','App\Http\Controllers\adminController@deletePost');


//Nav Menu categories
Route::get('/deleteCategory/{id}','App\Http\Controllers\adminController@deleteCategory');
Route::get('/editCategory/{id}','App\Http\Controllers\adminController@editCategory');
Route::post('/updateCategory/{id}','App\Http\Controllers\crudController@updateData');
Route::post('/addService','App\Http\Controllers\crudController@insertData');
Route::get('/editService/{id}','App\Http\Controllers\adminController@editCategory');
Route::post('/updateService/{id}','App\Http\Controllers\crudController@updateData');
Route::get('/deleteService/{id}','App\Http\Controllers\adminController@deleteService');

//team
Route::get('new-member','App\Http\Controllers\adminController@newMember');
Route::post('/addMember','App\Http\Controllers\crudController@insertData');
Route::get('/all-members','App\Http\Controllers\adminController@allmembers');
Route::get('/editteam/{id}','App\Http\Controllers\adminController@editmember');
Route::post('/updateTE/{id}','App\Http\Controllers\crudController@updateData');
Route::get('/deleteTE/{id}','App\Http\Controllers\adminController@deleteteam');

//messages
 Route::post('sendMessage','App\Http\Controllers\frontController@sendMessage');


