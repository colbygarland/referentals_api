<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewCategoryController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CategoryController::class)->group(function(){
    Route::post('/categories/store', 'store');
    Route::patch('/categories/{id}', 'update');
    Route::get('/categories', 'index');
    Route::delete('/categories/{id}', 'destroy');
});

Route::controller(ReviewController::class)->group(function(){
    Route::post('/reviews/store', 'store');
    Route::patch('/reviews/{id}', 'update');
    Route::get('/reviews', 'index');
    Route::delete('/reviews/{id}', 'destroy');
});

Route::controller(ReviewCategoryController::class)->group(function(){
    Route::post('/review_categories/store', 'store');
    Route::patch('/review_categories/{id}', 'update');
    Route::get('/review_categories', 'index');
    Route::delete('/review_categories/{id}', 'destroy');
});