<?php

use src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Suser::class, 'signup'])->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\Authorization::class, 'login']);
Route::add('GET', '/logout', [Controller\Authorization::class, 'logout'])->middleware('auth');
Route::add(['GET', 'POST'], '/places', [Controller\Admin::class, 'room'])->middleware('auth');
Route::add(['GET', 'POST'], '/divisions', [Controller\Admin::class, 'division'])->middleware('auth');
Route::add(['POST'], '/addRoom', [Controller\Admin::class, 'addRoom'])->middleware('auth');
Route::add(['GET', 'POST'], '/profile', [Controller\Authorization::class, 'profile'])->middleware('auth');