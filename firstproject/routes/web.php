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

Route::get('/hello', function () {
    return redirect('https://www.lbrce.ac.in');
});
Route::get('/',function(){
    return view('welcome');
});
Route::get('/laravel',function(){
    return 'this is laravel';
});
Route::get('/contact',function(){
    return view('Contact',['id'=>'bharath','name'=>'24']);
});
Route::get('post1/{id}',function($id){
    return 'id is '.$id;
});
Route::get('post2/{id}/{name}',function($id,$name){
    return 'id is '.$id." ".$name;
});
Route::get('optional/{name?}',function($name=null){
    return 'name is '.$name;
});
Route::get('regex/{id}',function($id){
    return 'id is '.$id;
})->where('id','[0-9]+');
Route::get('regex1/{name}',function($name){
    return 'name is '.$name;
})->where('name','[a-zA-Z]+');
Route::get('/postd','PostController@display');
Route::get('/post{id}','PostController@index');
Route::get('/student','StudentController@display');
