<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LinkController, AddLinkController};

Route::view('/', 'mainpage');
Route::post('/addlink', [AddLinkController::class, 'addLink']);
Route::get('/login', [LoginController::class, '']);
Route::get('/registration', [RegistrationController::class, '']);
Route::get('/logout', [LoginController::class, '']);
Route::get('/user', [ShowUserController::class, '']);
Route::get('/user/mylinks', [ShowUserController::class, '']);
Route::post('/user/addlink', [AddLinkController::class, '']);
Route::post('/user/deletelink', [DeleteLinkController::class, '']);
//Route::get('/{link}', [LinkController::class, 'test']);