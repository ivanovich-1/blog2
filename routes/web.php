<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('set_language/{lang}', 'Controller@setLanguage')->name('set_language');

Route::get('/', 'PagesController@home')->name('pages.home');
Route::get('about', 'PagesController@about')->name('pages.about');
Route::get('archive', 'PagesController@archive')->name('pages.archive');
Route::get('contact', 'PagesController@contact')->name('pages.contact');

Route::get('posts', 'PagesController@home');
Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
Route::get('categories/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');

Route::post('posts/{post}/comments',"CommentsController@store")->name('posts.comments.store');
Route::delete('comments/{comment}', 'CommentsController@destroy')->name('posts.comments.destroy');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'dashboardAccess']
], function (){
    Route::get('/', 'AdminController@index')->name('dashboard');

    Route::resource('posts', 'PostsController', ['except' => ['show', 'create'], 'as' => 'admin']);

    Route::resource('users', 'UsersController', ['as' => 'admin']);

    Route::resource('roles', 'RolesController', ['as' => 'admin']);

    Route::middleware('role:Admin')
        ->put('users/{user}/roles', 'UsersRolesController@update')
        ->name('admin.users.roles.update');
    Route::middleware('role:Admin')
        ->put('users/{user}/permission', 'UsersPermissionsController@update')
        ->name('admin.users.permission.update');


    Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
    Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');

});

// Rutas de login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');




