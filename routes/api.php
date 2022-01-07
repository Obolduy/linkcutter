<?php

use App\Http\Controllers\{AddLinkController, DeleteLinkController, ApiTokenController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\LinksList;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/link', function (Request $request) {
        return ["links" => LinksList::where('user_id', $request->user()->id)->get()];
    });

    Route::post('/link', [AddLinkController::class, 'apiAddLink']);

    Route::delete('/link/{id}', [DeleteLinkController::class, 'deleteLink']);
});

Route::get('/link/{id}', function (int $id) {
    return LinksList::where('id', $id)->first();
});

Route::post('/registration', [ApiTokenController::class, 'apiGenerateToken']);