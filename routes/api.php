<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;


Route::post('/addImages/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/allrequests', [TransactionController::class, 'index'])->name('requests.index')->middleware('auth:sanctum');
Route::get('/requests/{gst_no}', [TransactionController::class, 'show'])->middleware('auth:sanctum');
Route::get('/allusers', [TransactionController::class, 'form'])->name('requests.form')->middleware('auth:sanctum');
Route::post('/requests/add', [TransactionController::class, 'store'])->name('requests.store')->middleware('auth:sanctum');
Route::get('/getproducts', [ProductController::class, 'show'])->name('products.show')->middleware('auth:sanctum');
Route::post('/product/add', [ProductController::class, 'store'])->name('products.store')->middleware('auth:sanctum');








