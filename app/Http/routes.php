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

Route::post('/register', 'UserController@register');

Route::group(['prefix' => 'admin'], function () {
    $pages = [
        'dashboard' => 'Dashboard',
        'users' => 'Benutzer',
        'levels' => 'Levels',
        'teams' => 'Teams',
        'statistics' => 'Statistik'
    ];

    Route::get('login', function () use ($pages) {
        return view('admin.login', ['pages' => $pages]);
    });

    Route::post('login', 'AdminController@authenticate');

    foreach ($pages as $page => $pageName) {
        Route::get($page, ['middleware' => 'auth', function () use ($pages, $page) {
            return view('admin.' . $page, ['pages' => $pages]);
        }]);
    }
});