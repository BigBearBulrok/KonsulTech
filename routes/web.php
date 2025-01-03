<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/reviews', [FeedbackController::class, 'reviews'])->name('reviews');
Route::get('/', [FeedbackController::class, 'welcome'])->name('welcome');
