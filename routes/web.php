<?php

use Illuminate\Support\Facades\Route;
use App\Models\Settings;

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
Route::group(['middleware' => 'throttle:100,1'], function ()
{

    $settings = Settings::find(1);

	Auth::routes(['register' => false]);

	Route::group(['middleware' => 'auth'], function() {

		Route::post('/admin/page', 'PageController@create');
		Route::put('/admin/page/{id}', 'PageController@update');
		Route::patch('/admin/page/weights', 'PageController@updateWeights');
        Route::delete('/admin/page/{id}', 'PageController@discard');

		Route::post('/admin/project', 'ProjectController@create');
		Route::put('/admin/project/{id}', 'ProjectController@update');
        Route::delete('/admin/project/{id}', 'ProjectController@discard');

		Route::patch('/admin/projects/weights', 'ProjectController@updateWeights');

		Route::post('/admin/block', 'BlockController@create');
		Route::put('/admin/blocks', 'BlockController@updateMultiple');
        Route::delete('/admin/block/{id}', 'BlockController@discard');

		Route::post('/admin/section', 'SectionController@create');
		Route::put('/admin/section/{id}', 'SectionController@update');
        Route::delete('/admin/section/{id}', 'SectionController@discard');
        Route::patch('/admin/section/{id}/up', 'SectionController@moveUp');
        Route::patch('/admin/section/{id}/down', 'SectionController@moveDown');

        Route::get('/admin/media', 'MediaController@showMediaForm');
        Route::post('/admin/media', 'MediaController@uploadMedia');
        Route::put('/admin/media/{id}', 'MediaController@updateMedia');
        Route::delete('/admin/media/{id}', 'MediaController@deleteMedia');
        Route::get('/admin/media-data/', 'MediaController@getMediaData');
        Route::get('/admin/media-data/{stringIDs}', 'MediaController@getMediaData');
        Route::get('/admin/media-data/project/{projectID}', 'MediaController@getProjectMediaData');

        Route::get('/admin/settings', 'SettingsController@showSettingsForm');
        Route::put('/admin/settings', 'SettingsController@updateSettings');

        Route::get('/admin/user', 'UserController@showForm');
        Route::put('/admin/user', 'UserController@update');

	});

	Route::post('/contact', 'WebController@contactUs');
	Route::post('/review', 'WebController@submitReview');

    Route::get('/review/approve/{id}', 'WebController@approveReview');
    Route::get('/review/discard/{id}', 'WebController@discardReview');

    if (isset($settings->projects) && $settings->projects === 1) {
        Route::get('/project/{slug}', 'ProjectController@show');
        Route::get('/project/{slug}/next', 'ProjectController@showNext');
        Route::get('/project/{slug}/prev', 'ProjectController@showPrev');
    }

    Route::get('/', 'PageController@show');
    Route::get('/{slug}', 'PageController@show');


});
