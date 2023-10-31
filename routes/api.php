<?php

use App\Http\Controllers\Api\SubDistrict\ListSubDistrictController;
use App\Http\Controllers\Api\SubDistrict\ShowSubDistrictController;
use App\Http\Controllers\Api\User\ListFavouritePlaceController;
use App\Http\Controllers\Api\User\StoreFavouritePlaceController;
use App\Http\Controllers\Api\User\DeleteFavouritePlaceController;
use App\Http\Controllers\Api\User\SearchPlaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', \App\Http\Controllers\Api\Auth\LoginController::class);
Route::post('register', \App\Http\Controllers\Api\Auth\RegisterController::class);
Route::get('/place', \App\Http\Controllers\Api\Place\ListPlaceController::class);
Route::get('/place/search', \App\Http\Controllers\Api\Place\SearchPlaceController::class);
Route::get('/place/{place}', \App\Http\Controllers\Api\Place\ShowPlaceController::class);
Route::get('/place/{place}/menu', \App\Http\Controllers\Api\Menu\ListMenuController::class);
Route::get('/place/{place:id}/menu/{menu:id}', \App\Http\Controllers\Api\Menu\ShowMenuController::class);
Route::get('/sub-district', ListSubDistrictController::class);
Route::get('/sub-district/{subDistrict}', ShowSubDistrictController::class);
Route::get('/sub-district/{subDistrict}/place', \App\Http\Controllers\Api\SubDistrict\ListPlaceBySubDistrictController::class);
Route::post('/user/place/{place}/favourite', StoreFavouritePlaceController::class)->middleware('auth:sanctum');
Route::delete('/user/place/{place}/favourite', DeleteFavouritePlaceController::class)->middleware('auth:sanctum');
Route::get('/user/place', ListFavouritePlaceController::class)->middleware('auth:sanctum');
