<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\FrontendPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:api')->group(function(){
    Route::get('/post/like/{post}', [FrontendPostController::class, 'likePost'])->name('post.like');
});


Route::get('/send-test-mail', [FrontendPostController::class, 'sendTestMail'])->name('sendtestmail');

