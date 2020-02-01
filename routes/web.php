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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/{tweetId}', 'TweetController@show');

Route::post('/post', 'TweetController@show');
Route::post('/profile', 'TweetController@CreateTweet');
Route::post('/profile/delete', 'TweetController@deleteTweet');
Route::post('/editpost', 'TweetController@editTweet');
