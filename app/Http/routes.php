<?php

/* Frontend Routes */
Route::get('/', function () {
    return view('home');
});

Route::get('/categories', function () {
    return view('categories');
});
/* Frontend Routes */

/* Frontend Auth Routes */
Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@authenticate');

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', 'UserController@register');
/* Frontend Auth Routes */

/* Admin Routes */
Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

Route::group(['prefix' => 'admin'], function () {
    /* Admin Auth Routes */
    Route::get('login', 'AdminController@login');
    Route::post('login', 'AdminController@authenticate');
    /* Admin Auth Routes */

    $pages = [
        'dashboard' => 'Dashboard',
        'users' => 'Benutzer',
        'levels' => 'Levels',
        'teams' => 'Teams',
        'statistics' => 'Statistik'
    ];

    foreach ($pages as $page => $pageName) {
        Route::get($page, ['middleware' => 'auth:admin', function () use ($pages, $page) {
            return view('admin.' . $page, ['pages' => $pages]);
        }]);
    }
});
/* Admin Routes */