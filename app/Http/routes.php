<?php

/* Frontend Routes */
Route::get('/', function () {
    return view('home');
});

Route::get('/categories', 'CategoryController@index');
Route::get('/category/{id}', 'CategoryController@levels');

Route::get('/level/{id}', 'LevelController@show');


/* Frontend Routes */

/* Frontend Auth Routes */
Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@authenticate');

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', 'UserController@register');
/* Frontend Auth Routes */

Route::get('/uploads/{name}', function ($name) {
    $file = Storage::disk('public')->get($name);
    $mimeType = Storage::disk('public')->mimeType($name);

    return response($file, 200, [
        'Content-Type' => $mimeType
    ]);
});

/* Admin Routes */
Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    /* Admin Auth Routes */
    Route::get('login', 'LoginController@show');
    Route::post('login', 'LoginController@login');

    Route::get('user/{id?}', 'AdminController@user');
    Route::post('user', 'AdminController@saveUser');
    Route::delete('user/{id}', 'AdminController@deleteUser');

    Route::get('team/create', 'AdminController@createTeam');
    Route::post('team/create', 'AdminController@storeTeam');
    Route::get('team/{id}', 'AdminController@editTeam');
    Route::post('team/{id}/update', 'AdminController@updateTeam');
    Route::delete('team/{id}', 'AdminController@deleteTeam');

    Route::get('category/{id?}', 'CategoryController@show');
    Route::post('category', 'CategoryController@save');
    Route::delete('category/{id}', 'CategoryController@delete');
    Route::post('category/{id}/active', 'CategoryController@setCategoryActive');

    Route::get('task/{id?}', 'TaskController@show');
    Route::post('task', 'TaskController@save');
    Route::delete('task/{id}', 'TaskController@delete');

    Route::post('file', 'AdminController@uploadFile');
    Route::delete('file/{name}', 'AdminController@deleteFile');

    Route::get('level/{id?}', 'AdminController@level');
    Route::post('level', 'AdminController@saveLevel');
    Route::delete('level/{id}', 'AdminController@deleteLevel');

    $pages = \App\Http\Controllers\Admin\BaseController::$pages;

    foreach ($pages as $page => $pageName) {
        Route::get($page, 'AdminController@' . $page);
    }
});
/* Admin Routes */