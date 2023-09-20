<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/','login');

Route::middleware('auth')->group(function (){
    Route::get('/home', function () {
        return view('welcome');
    });
});

Route::get('/sub-district',\App\Http\Controllers\SubDistrictController::class)->name('subdistrict.index');
