<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\TestController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [ContentController::class, 'index'])->name('home');
    Route::resource('test', TestController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('polls', PollController::class);
    Route::get('/create', [CreateController::class, 'index'])->name('create.index');
});
