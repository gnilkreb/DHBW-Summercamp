<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});
