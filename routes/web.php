<?php


Route::get('/new', function(){
    return view('welcome');
});
Route::post('/new','NewController@index');


