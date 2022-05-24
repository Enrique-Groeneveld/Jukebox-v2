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

use App\Http\Controllers\API\PassportAuthController;


Route::get('/song/{song}', [App\Http\Controllers\SongController::class, 'show']);
Route::get('/songs', [App\Http\Controllers\SongController::class, 'index']);


Route::get('/artist/{artist}', [App\Http\Controllers\ArtistController::class, 'show']);
Route::get('/artists', [App\Http\Controllers\ArtistController::class, 'index']);

Route::get('/genre/{genre}', [App\Http\Controllers\SongController::class, 'show']);
Route::get('/genres', [App\Http\Controllers\SongController::class, 'index']);


Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/playlist/{playlist}', [App\Http\Controllers\PlaylistController::class, 'show']);
    Route::post('/addsong/{playlist}', [App\Http\Controllers\PlaylistController::class, 'insertinto']);
    Route::post('/addPlaylist', [App\Http\Controllers\PlaylistController::class, 'create']);
    Route::delete('/playlist/destroy/{playlist}', [App\Http\Controllers\PlaylistController::class, 'destroy']);
    Route::delete('/removeSong/{playlist}/{id}', [App\Http\Controllers\PlaylistController::class, 'destroyRow']);

    Route::get('/playlists', [App\Http\Controllers\PlaylistController::class, 'index']);
    Route::get('check', [PassportAuthController::class, 'userInfo']);
});
