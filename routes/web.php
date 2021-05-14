<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@showArticle')->name('home');
Route::get('category/{id}', 'MainController@showCategory')->name('category');
Route::get('detail/{id}', 'MainController@detail')->name('detail');

Route::get('login', 'MainController@login')->name('login');
Route::post('loginAttempt', 'MainController@loginAttempt')->name('loginAttempt');

Route::get('register', 'MainController@register')->name('register');
Route::post('registerAttempt', 'MainController@registerAttempt')->name('registerAttempt');

Route::group(['middleware' => 'auth'], function() {
    Route::get('userHome', 'MainController@greet')->name('userHome');
    Route::get('profile', 'MainController@showProfile')->name('profile');
    Route::patch('profileUpdate', 'MainController@updateProfile')->name('profileUpdate');
    Route::get('blog', 'MainController@showBlog')->name('blog');
    Route::get('createBlog', 'MainController@createBlog')->name('createBlog');
    Route::post('storeBlog', 'MainController@storeBlog')->name('storeBlog');
    Route::delete('destroyBlog/{id}', 'MainController@destroyBlog')->name('destroyBlog');
    Route::get('fullStory/{id}', 'MainController@blogDetail')->name('fullStory');

    Route::get('showUsers', 'MainController@showUsers')->name('showUsers');
    Route::delete('destroyUser/{id}', 'MainController@destroyUser')->name('destroyUser');
    Route::get('post', 'MainController@showStuff')->name('post');
    Route::delete('destroyArticle/{id}', 'MainController@destroyArticle')->name('destroyArticle');
    Route::get('fullArticle/{id}', 'MainController@articleDetail')->name('fullArticle');
    Route::get('showMemes', 'MainController@showMemes')->name('showMemes');
    Route::post('storeCategory', 'MainController@storeCategory')->name('storeCategory');
});

Route::post('logout', 'MainController@logout')->name('logout');