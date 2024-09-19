<?php

\Illuminate\Support\Facades\Route::get('/create-article-test', function() {
    \Illuminate\Support\Facades\Artisan::call('app:create-article');
    return \Illuminate\Support\Facades\Artisan::output();
});
