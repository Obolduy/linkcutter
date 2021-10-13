<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RegistrationController, LoginController, AddLinkController};

Route::view('/', 'mainpage');
Route::post('/addlink', [AddLinkController::class, 'addLink']);
Route::match(['GET', 'POST'], '/login', [LoginController::class, 'login']);
Route::match(['GET', 'POST'], '/registration', [RegistrationController::class, 'registration']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/user', [ShowUserController::class, '']);
Route::get('/user/mylinks', [ShowUserController::class, '']);
Route::post('/user/addlink', [AddLinkController::class, '']);
Route::post('/user/deletelink', [DeleteLinkController::class, '']);
//Route::get('/{link}', [LinkController::class, 'test']);