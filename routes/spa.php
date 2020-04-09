<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SPA Routes
|--------------------------------------------------------------------------
|
| Here is where the SPA frontend route is registered. This
| route is loaded by the RouteServiceProvider within a group which
| contains the "spa" middleware group.
|
*/

Route::get('{path}', function () {
    return view('index');
})->where('path', '(.*)');
