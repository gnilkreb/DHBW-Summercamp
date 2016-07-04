<?php

/* Frontend Routes */
use App\Http\Controllers\AdminController;

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

    Route::get('user/{id?}', 'AdminController@user');
    Route::post('user', 'AdminController@saveUser');

    Route::get('team/create', 'AdminController@createTeam');
    Route::post('team/create', 'AdminController@storeTeam');
    Route::get('team/{id}', 'AdminController@editTeam');
    Route::post('team/{id}/update', 'AdminController@updateTeam');

    Route::get('category/{id?}', 'AdminController@category');
    Route::post('category', 'AdminController@saveCategory');
    Route::delete('category/{id}', 'AdminController@deleteCategory');
    Route::post('category/{id}/active', 'AdminController@setCategoryActive');
    
    Route::get('level/{id?}', 'AdminController@level');
    Route::post('level', 'AdminController@saveLevel');
    Route::delete('level/{id}', 'AdminController@deleteLevel');

    $pages = AdminController::$pages;

    foreach ($pages as $page => $pageName) {
        Route::get($page, 'AdminController@' . $page);
    }
});
/* Admin Routes */