<?php

Route::get('/','SweetController@getIndex');

Route::get('/signup', 'SweetController@getSignup');
Route::post('/signup','SweetController@postSignup');

Route::get('/login', 'SweetController@getLogin');
Route::post('/login','SweetController@postLogin');

Route::get('/newpost', 'SweetController@getNewpost');
Route::post('/newpost','SweetController@postNewpost');

Route::get('/logout', 'SweetController@getLogout');