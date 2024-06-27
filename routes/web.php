<?php

use App\Http\Controllers\SvController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/test', [UserController::class,'index']);
//slug
Route::get('/test1/{id}/{name?}', [UserController::class,'showuser']);
//params
Route::get('/update-user', [UserController::class,'updateuser']);

//ttsv
Route::get('/ttsv',[SvController::class,'index']);