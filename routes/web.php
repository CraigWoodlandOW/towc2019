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
| Place any custom routes below this comment
*/

/*
| The 'catch-all' route must be placed here and after all other routes.
*/
//Route::get('/{slug}/draft/{page_draft}', '\Vanilla2\Core\PageController@pageDraft')->where([ 'slug' => '.*]*' ]);
Route::get('/{slug}', '\Vanilla2\Core\PageController@page')->where([ 'slug' => '.*]*' ]);
