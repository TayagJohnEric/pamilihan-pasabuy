<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/customer-dashboard', function () {
    return view('customer.home.home');
});

Route::get('/vendor-dashboard', function () {
    return view('vendor.dashboard.dashboard');
});

Route::get('/rider-dashboard', function () {
    return view('rider.dashboard.dashboard');
});

Route::get('/admin-dashboard', function () {
    return view('admin.dashboard.dashboard');
});