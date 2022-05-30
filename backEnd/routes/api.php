<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MembreController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//                                           \/
/** *********************************||     (_-_)
****                              ***||______| |
****   ROUTER FOR THE POST MODEL  ***||________|
****                              ***||
*************************************/
Route::match(['get','post'],'store/post/{id}',[PostController::class,'store']);
Route::match(['get','post'],'getAll/post',[PostController::class,'index']);
Route::match(['get','post'],'get/post/{id}',[PostController::class,'show']);
Route::match(['get','post'],'getAll/comments/{id}',[PostController::class,'postAnwsers']);
Route::match(['get','post'],'post/{id}',[PostController::class,'destroy']);


/** *********************************||     (_-_)
****                              ***||______| |
****   ROUTER FOR THE MEMBRE MODEL  ***||________|
****                              ***||
*************************************/

Route::match(['get','post'],'membre/store',[MembreController::class,'store']);
Route::match(['get','post'],'getAll/membres',[MembreController::class,'index']);
Route::match(['get','post'],'get/membre/{id}',[MembreController::class,'show']);
Route::match(['get','post'],'membre/delete/{id}',[MembreController::class,'destroy']);
