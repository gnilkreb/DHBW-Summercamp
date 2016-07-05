<?php

/* Frontend Routes */
Route::get('/', 'HomeController@index');

/* Categories */
Route::get('/categories', 'CategoryController@index');
Route::get('/category/{id}', 'CategoryController@levels');

/* Level */
Route::get('/level/{id}', 'LevelController@show');

/* Tasks */
Route::get('/task/{id}', 'TaskController@show');

/* Frontend Auth Routes */
Route::get('/register', 'AuthController@showRegister');
Route::get('/login', 'AuthController@showLogin');
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

/* File Upload retrieval */
Route::get('/uploads/{name}', 'Admin\FileController@show');

/* Admin Redirect */
Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

/* Admin Routes */

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    /* Auth */
    Route::get('login', 'LoginController@index');

    /* Dashboard */
    Route::get('dashboard', 'DashboardController@index');
    Route::post('option/{id}', 'DashboardController@option');

    /* Users */
    Route::get('users', 'UserController@index');
    Route::get('user/{id?}', 'UserController@show');
    Route::post('user', 'UserController@save');
    Route::delete('user/{id}', 'UserController@delete');

    /* Categories */
    Route::get('category/{id?}', 'CategoryController@show');
    Route::post('category', 'CategoryController@save');
    Route::delete('category/{id}', 'CategoryController@delete');
    Route::post('category/{id}/active', 'CategoryController@setCategoryActive');
    
    /* Levels */
    Route::get('levels', 'LevelController@index');
    Route::get('level/{id?}', 'LevelController@show');
    Route::post('level', 'LevelController@save');
    Route::delete('level/{id}', 'LevelController@delete');

    /* Tasks */
    Route::get('task/{id?}', 'TaskController@show');
    Route::post('task', 'TaskController@save');
    Route::delete('task/{id}', 'TaskController@delete');
    
    /* Teams */
    Route::get('teams', 'TeamController@index');
    Route::get('team/create', 'TeamController@createTeam');
    Route::post('team/create', 'TeamController@storeTeam');
    Route::get('team/{id}', 'TeamController@editTeam');
    Route::post('team/{id}/update', 'TeamController@updateTeam');
    Route::delete('team/{id}', 'TeamController@deleteTeam');
    
    /* Files */
    Route::get('files', 'FileController@index');
    Route::post('file', 'FileController@upload');
    Route::delete('file/{name}', 'FileController@delete');
    
    /* Statistic */
    Route::get('statistics', 'StatisticController@index');
});