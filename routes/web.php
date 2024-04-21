<?php

use Illuminate\Support\Facades\Route;

Route::get('/name', function () {
    return dd("Hi");
});

Route::get('/', function () {
    return view('welcome');
});