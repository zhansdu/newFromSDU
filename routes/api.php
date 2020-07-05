<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('book')->group(static function () {
    Route::get('search/{searchType}', 'BookController@search');
    Route::get('{id}', 'BookController@show');
});

