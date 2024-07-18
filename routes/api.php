<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get("profile",[ProfileController::class,'index']);
Route::get("profile/add",[ProfileController::class,'create'])->name('profile.create');
Route::post("profile/post",[ProfileController::class,'post'])->name('profile.post');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
