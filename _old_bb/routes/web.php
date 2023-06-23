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
Route::get('/',      function () { return view('homepage'); })->name('homepage');
Route::get('/links', function () { return view('links');    })->name('links');


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
    $jsonString = file_get_contents(resource_path('json-resume/resume.json'));
    $resumeObj = json_decode($jsonString);

    return view('cv.main', ['hide' => false])
        ->with('resume', $resumeObj);
})->name('cv.main');

Route::get('/cv/hide', function () {
    return view('cv.main', ['hide' => true]);
})->name('cv.hide');

Route::get('/cv/print', function () {
    return view('cv.print');
})->name('cv.print');

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
    Route::get('photos/admin/thumbnails', 'PhotoController@rebuildThumbnails')
        ->name('photos.thumbnails');
    Route::resource('photos', 'PhotoController')
        ->except( 'show');
});

Route::resource('photos', 'PhotoController')
    ->only('index');
Route::get('photos/id/{id}', 'PhotoController@showById')
    ->name('photos.show');
Route::get('photos/{slug}', 'PhotoController@showBySlug')
    ->name('photos.show-slug');
