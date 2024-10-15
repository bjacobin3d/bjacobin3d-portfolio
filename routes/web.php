<?php

use App\Http\Controllers\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('resume', [PageController::class, 'resume'])->name('resume');
Route::get('portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('portfolio/{portfolioItem:slug}', [PageController::class, 'portfolioShow'])->name('portfolioShow');
