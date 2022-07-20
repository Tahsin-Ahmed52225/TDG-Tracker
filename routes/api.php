<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['cors'])->group(function () {
    Route::post('/update-info', 'TrackerController@update');
    Route::get('/get-locked-ip', 'TrackerController@getLockedIP');
});
