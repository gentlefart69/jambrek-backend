<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Api', 'middleware' => 'api'], function () {
    Route::post('/login', 'SessionController@login');
    Route::post('/register', 'SessionController@register');
    Route::delete('/logout', 'SessionController@logout');


    Route::group(['prefix' => 'belts'], function () {
        // http://localhost:8000/api/belts -> Sve kaiseve
        Route::get('/', 'BeltController@getAll');

        // http://localhost:8000/api/belts/42 -> Kais sa id-jem 42
        Route::get('/{belt}', 'BeltController@getBelt');

        // http://localhost:8000/api/belts/new -> Napravi novi
        Route::post('/new', 'BeltController@addBelt');

        // http://localhost:8000/api/belts/42 -> Update kaisa 42
        Route::post('/{belt}', 'BeltController@updateBelt');

        // http://localhost:8000/api/belts/42/delete -> Obrisi kais sa id-jem 42
        Route::delete('/{belt}/delete', 'BeltController@deleteBelt');
    });;
});
