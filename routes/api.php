<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/',[StudentController::class,'index']);
Route::post('/store',[StudentController::class,'store']);
Route::get('/showStudent/{id}',[StudentController::class,'show']);
Route::post('/updateStudent/{id}',[StudentController::class,'update']);
Route::delete('/deleteStudent/{id}',[StudentController::class,'destroy']);