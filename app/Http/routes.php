<?php
/*
*************
The ORDER of ROUTES is critical
*/
Route::group(['middleware' => ['web']], function() {


    Route::controller('auth/password', 'Auth\PasswordController', [
        'getEmail' => 'auth.password.email',
        'getReset' => 'auth.password.reset'
    ]);

    Route::controller('auth', 'Auth\AuthController', [
      'getLogin' => 'auth.login',
      'getLogout' => 'auth.logout'
    ]);
    //watch out for match anything ROUTES

    Route::get('admin/users/{users}/confirm', ['as' => 'admin.users.confirm', 'uses' => 'Admin\UsersController@confirm']);
    Route::resource('admin/users', 'Admin\UsersController', ['except' => ['show'] ]);

    Route::get('backend/pages/{pages}/confirm', ['as' => 'backend.pages.confirm', 'uses' => 'backend\PagesController@confirm']);
    Route::resource('backend/pages', 'Backend\PagesController', ['except' => ['show'] ]);

    Route::get('backend/blog/{blog}/confirm', ['as' => 'backend.blog.confirm', 'uses' => 'Backend\BlogController@confirm']);
    Route::resource('backend/blog', 'Backend\BlogController');

    Route::get('admin/story/{story}/confirm', ['as' => 'admin.story.confirm', 'uses' => 'Admin\StoryController@confirm']);
    Route::resource('admin/story', 'Admin\StoryController');


    Route::get('admin/storyimages/{storyimages}/confirm', ['as' => 'admin.storyimages.confirm', 'uses' => 'Admin\StoryImageController@confirm']);
    Route::resource('admin/storyimages', 'Admin\StoryImageController');



    Route::get('admin/dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@index']);

    Route::get('main', function ()    {
    return view('layouts.main');
    });

});
