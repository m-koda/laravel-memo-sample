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

Route::get('/', function(){
  if (Auth::check()) {
    return redirect()->route('memo.index');
  } else {
    return view('home');
  }
})->name('home');
Auth::routes();
Route::resource('memo', 'MemoController')->middleware('auth');
Route::get('tags/{tag}', 'TagController@show')->name('tags.show')->middleware('auth');
