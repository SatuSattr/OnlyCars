<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MerchandiseController;

Route::get('/', [IndexController::class, 'index']);
Route::resource('events', EventController::class);
Route::resource('gallery', GalleryController::class);
Route::resource('merchs', MerchandiseController::class);
Route::resource('index', IndexController::class);
