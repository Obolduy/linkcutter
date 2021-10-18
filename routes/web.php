<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    RegistrationController, LoginController, AddLinkController, LinkController,
    ShowUserController, ShowUserLinksController, UpdateLinkController, UpdateMailController,
    DeleteLinkController, ForgetPasswordController, ChangePasswordController, ChangeEmailController
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
Route::view('/account/forget_password', 'resetpasswordform');
Route::post('/account/forget_password/email_check', [ForgetPasswordController::class, 'checkEmail']);
Route::view('/account/forget_password/success', 'resetpasswordformsuccess');
Route::match(['GET', 'POST'], '/account/forget_password/reset_password/{hash}', [ForgetPasswordController::class, 'resetPassword']);
Route::match(['GET', 'POST'], '/account/change_password', [ChangePasswordController::class, 'changePassword']);
Route::get('/account/change_password/{hash}', [ChangePasswordController::class, 'changePasswordComplete']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/account/update_email/{hash}', [UpdateMailController::class, 'updatemaildate']);
Route::match(['GET', 'POST'], '/account/change_email/', [ChangeEmailController::class, 'changeEmailRequest']);
Route::get('/account/change_email/{hash}', [ChangeEmailController::class, 'changeEmailComplete']);
Route::get('/account', [ShowUserController::class, 'showuser']);
Route::get('/account/my_links', [ShowUserLinksController::class, 'showlinks']);
Route::get('/account/update_link/{link_id}', [UpdateLinkController::class, 'updatelink']);
Route::get('/account/delete_link/{link_id}', [DeleteLinkController::class, 'deleteLink']);
Route::get('/{link}', [LinkController::class, 'linkmanager']);