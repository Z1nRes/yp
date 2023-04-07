<?php

use src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout'])->middleware('auth');
Route::add(['GET', 'POST'], '/places', [Controller\Site::class, 'room'])->middleware('auth');
Route::add(['GET', 'POST'], '/divisions', [Controller\Site::class, 'division'])->middleware('auth');
Route::add(['POST'], '/addRoom', [Controller\Site::class, 'addRoom'])->middleware('auth');