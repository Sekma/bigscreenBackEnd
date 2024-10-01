<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\VisitorController;

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

// partie admin

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('logout', [AuthController::class, 'logout']);


// partie utilisateur

Route::get('question', [QuestionController::class, 'index']);

Route::post('visitor', [VisitorController::class, 'store']);

Route::delete('delete_visitor/{email}', [VisitorController::class, 'destroy']);

Route::post('answer', [AnswerController::class, 'store']);

Route::get('answer/{ref}', [AnswerController::class, 'show']);

// partie admin

Route::get('admin_question', [QuestionController::class, 'index']);

Route::get('admin_answer', [AnswerController::class, 'index']);