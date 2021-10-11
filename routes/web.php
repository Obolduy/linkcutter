<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'mainpage');
Route::post('/addlink', [AddLinkController::class, '']);
Route::get('/{link}', [LinkController::class, '']);
Route::get('/login', [LoginController::class, '']);
Route::get('/registration', [RegistrationController::class, '']);
Route::get('/logout', [LoginController::class, '']);
Route::get('/user', [ShowUserController::class, '']);
Route::get('/user/mylinks', [ShowUserController::class, '']);
Route::post('/user/addlink', [AddLinkController::class, '']);
Route::post('/user/deletelink', [AddLinkController::class, '']);