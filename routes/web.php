<?php


//Route::get('/new', function(){
//    return view('welcome');
//});
Route::get('/','NewController@app');
Route::get('/new','NewController@index');
Route::post('/save','NewController@store');
Route::get('/gt/{code}','NewController@check');


