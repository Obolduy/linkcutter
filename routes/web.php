<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    RegistrationController, LoginController, AddLinkController, LinkController,
    ShowUserController, ShowUserLinksController
};

Route::view('/', 'mainpage');
Route::post('/addlink', [AddLinkController::class, 'addLink']);
Route::match(['GET', 'POST'], '/login', [LoginController::class, 'login']);
Route::match(['GET', 'POST'], '/registration', [RegistrationController::class, 'registration']);
Route::get('/account/verify_email', function () {
    return view('auth.verify-email');
})->name('verification.notice');
Route::get('/account/verify_email/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->name('verification.verify');
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/account', [ShowUserController::class, 'showuser']);
Route::get('/account/my_links', [ShowUserLinksController::class, 'showlinks']);
Route::get('/account/update_link/{link_id}', [UpdateLinkController::class, 'updatelink']);
Route::post('/account/addlink', [AddLinkController::class, '']);
Route::post('/account/deletelink', [DeleteLinkController::class, '']);
Route::get('/{link}', [LinkController::class, 'linkmanager']);