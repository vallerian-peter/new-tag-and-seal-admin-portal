<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/solutions', function () {
    return view('solutions');
});

Route::get('/contact', function () {
    return view('contact');
});
