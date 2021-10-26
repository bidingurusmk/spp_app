<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\siswaController;

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
Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'login']);
Route::post('register_siswa', [siswaController::class,'register']);

Route::group(['middleware'=>['jwt.verify:petugas']],function(){
	Route::get('/get_profile',[UserController::class,'getprofile']);
});

Route::group(['middleware'=>['jwt.verify:admin']],function(){
	Route::get('/get_profile_admin',[UserController::class,
		'getprofileadmin']);
});



