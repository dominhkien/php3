<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SvController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/test', [UserController::class, 'index']);
//slug
Route::get('/test1/{id}/{name?}', [UserController::class, 'showuser']);
//params
Route::get('/update-user', [UserController::class, 'updateuser']);

//ttsv
Route::get('/ttsv', [SvController::class, 'index']);

Route::group(['prefix' => 'users','as'=>'users.',], function () {
    Route::get('list-users', [UserController::class, 'showuser'])->name('showuser');
    Route::get('add-users', [UserController::class, 'showadd'])->name('showadd');
    Route::post('add',[UserController::class,'add'])->name('add');
    Route::get('delete/{id}',[UserController::class,'delete'])->name('delete');
    Route::get('edit/{id}',[UserController::class,'updateuser'])->name('updateuser');
    Route::put('edit/{id}',[UserController::class,'edit'])->name('edit');

});
Route::group(['prefix'=>'product','as'=>'product.'],function(){
    Route::get('list-product',[ProductController::class,'index'])->name('list');
    Route::get('show-add',[ProductController::class,'create'])->name('add');
    Route::post('add-product',[ProductController::class,'store'])->name('addproduct');
    Route::get('delete/{id}',[ProductController::class,'destroy'])->name('delete');
    Route::get('edit/{id}',[ProductController::class,'edit'])->name('edit');
    Route::put('edit/{id}',[ProductController::class,'update'])->name('update');
});
Route::get('layout',[ProductController::class,'list']);