<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('book', 'BookController')->except([
    'create', 'edit'
]);

Route::get('book/search/{q}', 'BookController@search');
Route::post('book/autocomplete', 'BookController@autocomplete');

