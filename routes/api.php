<?php

Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');
    Route::get('rooms', 'RoomsController@index');
    Route::post('/book/room', 'BookingsController@index');
    Route::post('/checkin', 'BookingsController@checkin');
    Route::post('/checkout', 'BookingsController@checkout');
    Route::post('/booking/payment', 'PaymentsController@payment');
    Route::get('/booking/list', 'BookingsController@bookingList');
});

