<?php

use App\Http\Controllers\IssueController;
use App\Http\Controllers\API\ContentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Issue;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/issues', [IssueController::class, 'index']);
Route::get('/contents', [ContentController::class, 'index']);
