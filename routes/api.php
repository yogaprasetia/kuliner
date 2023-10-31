<?php

use App\Http\Controllers\Api\SubDistrict\ListSubDistrictController;
use App\Http\Controllers\Api\SubDistrict\ShowSubDistrictController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/place', \App\Http\Controllers\Api\Place\ListPlaceController::class);
Route::get('/place/{place}', \App\Http\Controllers\Api\Place\ShowPlaceController::class);
Route::get('/place/{place}/menu', \App\Http\Controllers\Api\Menu\ListMenuController::class);
Route::get('/place/{place:id}/menu/{menu:id}', \App\Http\Controllers\Api\Menu\ShowMenuController::class);
Route::get('/sub-district', ListSubDistrictController::class);
Route::get('/sub-district/{subDistrict}', ShowSubDistrictController::class);
