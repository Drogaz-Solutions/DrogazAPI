<?php

use App\Http\Controllers\API\V1\DungeonsController;
use App\Http\Controllers\API\V1\ProfileController;
use App\Http\Controllers\API\V1\PetsController;
use App\Http\Controllers\API\V1\StatsController;   
use App\Http\Controllers\API\V1\MiscController;
use App\Http\Controllers\API\V1\WardrobeController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//api v1
Route::group(['prefix' => 'v1'], function () {
    Route::get('profile', [ProfileController::class, 'profile']);

    Route::get('skills', [StatsController::class, 'getSkills']);
    Route::get('collections', [StatsController::class, 'getCollections']);
    Route::get('bestiary', [StatsController::class, 'getBestiary']);

    Route::get('pets', [PetsController::class, 'getPets']);
    Route::get('dungeons', [DungeonsController::class, 'getDungeons']);
    Route::get('wardrobe', [WardrobeController::class, 'getWardrobe']);
    Route::get('armor', [WardrobeController::class, 'getCurrentArmor']);

    Route::get('bazaar', [MiscController::class, 'bazaar']);
});

