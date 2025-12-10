<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return redirect()->route('items.index');
});

Route::resource('categories', CategoryController::class);
Route::resource('items', ItemController::class);
