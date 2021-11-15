<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/formations', [FormationController::class, 'getFormations']);

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [UserController::class, 'login']);
    Route::get('/signup', [UserController::class, 'signup']);

    Route::post('/login', [UserController::class, 'login']);
    Route::post('/signup', [UserController::class, 'signup']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/account', [UserController::class, 'account']);
    Route::post('/account', [UserController::class, 'account']);
    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
    Route::get('/categories/{id}/delete', [CategoryController::class, 'delete']);
    Route::get('/categories/add', [CategoryController::class, 'add']);
    
    Route::post('/categories/{id}/edit', [CategoryController::class, 'edit']);
    Route::post('/categories/add', [CategoryController::class, 'add']);

    Route::get('/formations/{id}/edit', [FormationController::class, 'edit']);
    Route::get('/formations/{id}/delete', [FormationController::class, 'delete']);
    Route::get('/formations/add', [FormationController::class, 'add']);

    Route::post('/formations/{id}/edit', [FormationController::class, 'edit']);
    Route::post('/formations/add', [FormationController::class, 'add']);

    Route::get('/chapters/{id}/edit', [ChapterController::class, 'edit']);
    Route::get('/chapters/{id}/delete', [ChapterController::class, 'delete']);
    Route::get('/chapters/add', [ChapterController::class, 'add']);

    Route::post('/chapters/{id}/edit', [ChapterController::class, 'edit']);
    Route::post('/chapters/add', [ChapterController::class, 'add']);
});

Route::group(['middleware' => 'is.admin'], function () {
    Route::get('/admin', [AdminController::class, 'listUnapprovedUsers']);
    Route::get('/admin/{id}', [AdminController::class, 'validateUser']);
});

Route::get('/categories/{id}', [CategoryController::class, 'getFormationsByCategory']);
Route::get('/formations/{id}', [FormationController::class, 'getChaptersByFormation']);
Route::get('/chapters/{id}', [ChapterController::class, 'getChapterById']);
