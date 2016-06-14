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

Route::group(['prefix' => 'admin'], function () {
    $pages = [
        'login' => false,
        'dashboard' => 'Dashboard',
        'users' => 'Benutzer',
        'levels' => 'Levels',
        'teams' => 'Teams',
        'statistics' => 'Statistik'
    ];

    foreach ($pages as $page => $pageName) {
        Route::get($page, function () use ($pages, $page) {
            return view('admin.' . $page, ['pages' => $pages]);
        });
    }
});