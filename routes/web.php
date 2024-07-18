<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get("profile",[ProfileController::class,'index']);
Route::get("profile/add",[ProfileController::class,'create'])->name('profile.create');
Route::post("profile/post",[ProfileController::class,'store'])->name('profile.post');

Route::put("profile/update/{id}",[ProfileController::class,'store'])->name('profile.update');

Route::get('/', function () {
    return view('welcome');
});
