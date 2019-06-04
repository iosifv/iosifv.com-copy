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

/*
 *  ==== Homepage ====
 */
Route::get('/', function () {
    return view('welcome');
})->name('iosifv');


/*
 *  ==== Voyager ====
 */
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/*
 *  ==== CV ====
 */
Route::get('/cv', function () {
    return view('cv.main', ['hide' => false]);
})->name('cv.main');

Route::get('/cv/hide', function () {
    return view('cv.main', ['hide' => true]);
})->name('cv.hide');

Route::get('/cv/print', function () {
    return view('cv.print');
})->name('cv.print');

/*
 *  ==== Passwords ====
 */
Route::get('/passwords', function () {
    return view('passwords');
})->name('password-project');


/*
 *  ==== Tags ====
 */
Route::group(['middleware' => 'admin.user'], function()
{
    Route::resource('tags', 'TagController')
        ->except('show');
});

/*
 *  ==== Quotes ====
 */
Route::group(['middleware' => 'admin.user'], function()
{
    Route::get('quotes/admin', 'QuoteController@indexAdmin')
        ->name('quotes.admin');
    Route::resource('quotes', 'QuoteController')
        ->only('create', 'store', 'edit', 'update', 'destroy');
});
Route::resource('quotes', 'QuoteController')
    ->only('index');
Route::get('quotes/id/{id}', 'QuoteController@showById')
    ->name('quotes.show');
Route::get('quotes/{slug}', 'QuoteController@showBySlug')
    ->name('quotes.show-slug');


/*
 *  ==== Photos ====
 */
Route::group(['middleware' => 'admin.user'], function()
{
    Route::get('photos/admin', 'PhotoController@indexAdmin')
        ->name('photos.admin');
    Route::put('photos/create', 'PhotoController@create')
        ->name('photos.create');
    Route::resource('photos', 'PhotoController')
        ->except( 'show');
});

Route::resource('photos', 'PhotoController')
    ->only('index');
Route::get('photos/id/{id}', 'PhotoController@showById')
    ->name('photos.show');
Route::get('photos/{slug}', 'PhotoController@showBySlug')
    ->name('photos.show-slug');
