<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\FormationController;


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
************/
Route::match(['get','post'],'store/post',[PostController::class,'store']);
Route::match(['get','post'],'getAll/post',[PostController::class,'index']);
Route::match(['get','post'],'get/post/{id}',[PostController::class,'show']);
Route::match(['get','post'],'getAll_post_comments/{id_post}',[PostController::class,'postAnwsers']);
Route::match(['get','post'],'add_comment',[PostController::class,'anwser_post']);

Route::match(['get','post'],'post/{id}',[PostController::class,'destroy']);


/** *********************************||     (_-_)
****                              ***||______| |
****   ROUTER FOR THE MEMBRE MODEL  ***||________|
****                              ***||
*************************************/

Route::match(['get','post'],'membre/store',[MembreController::class,'store']);
Route::match(['get','post'],'getAll/membres',[MembreController::class,'index']);
Route::match(['get','post'],'get/membre/{cne}',[MembreController::class,'show']);




/** ***************************************||     (_-_)
****                                    ***||______| |
****   ROUTER FOR THE Formations MODEL  ***||________|
****                                    ***||
********************************************/
Route::match(['get','post'],'formation/getAll',[FormationController::class,'index']);


//auth routing
Route::match(['get','post'],'login',[AuthController::class,'login']);


Route::match(['get','post'],'logout',[AuthController::class,'logout']);
//protected route
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::match(['get','post'],'membre/validate/{cne}',[MembreController::class,'validate_membre']);
    Route::match(['get','post'],'formation/store',[FormationController::class,'store']);
   
    Route::match(['get','post'],'membre/delete/{cne}',[MembreController::class,'destroy']);
    Route::match(['get','post'],'formation/delete/{$id}',[FormationController::class,'destroy']);
});

