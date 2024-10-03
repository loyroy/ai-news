<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/article", function () {
    return response()->json(
        [
            'title' => 'This is an article title!',
            'content' => 'This is article content',
        ]
    );
});

