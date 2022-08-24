<?php

use Illuminate\Support\Facades\Route;



Route::middleware(['web', 'CORS'])->group(function () {
    Route::get('/', 'App\Http\Controllers\AgoraVideoController@home');
    Route::post('/submitForm', 'App\Http\Controllers\AgoraVideoController@mainSubmit')->name('submitForm');

});



Route::get('/test', 'App\Http\Controllers\AgoraVideoController@test');