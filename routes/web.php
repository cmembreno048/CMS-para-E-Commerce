<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MainController@getMain')->name('home');

Route::get('/login', 'ConnectController@getLogin')->name('login');
Route::post('/login', 'ConnectController@postLogin')->name('post_login');
Route::get('/logout', 'ConnectController@getLogout')->name('logout');

Route::prefix('/users')->group(function () {
    Route::get('/{value}', 'AdminUsersController@getUsers')->name('users_view');
    Route::get('/profile/{id}', 'AdminUsersController@getUsersProfile')->name('users_profile');
});

Route::prefix('/blog')->group(function () {

    Route::get('/{value}', 'AdminBlogController@getBlog')->name('blog_view');
    Route::prefix('/edit')->group(function () {
        Route::get('/{id}', 'AdminBlogController@getBlogEdit')->name('blog_Edit');
        Route::post('/{id}', 'AdminBlogController@postBlogEdit')->name('blog_Edit');
    });
    Route::delete('/delete/{id}', 'AdminBlogController@getBlogEdit')->name('blog_Edit');

});
