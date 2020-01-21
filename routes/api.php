<?php

use Illuminate\Http\Request;

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
Route::post('json',function (){
//    return responseJson('200','good','good');
//    $user=\App\User::all();
//    return responseJson1('200','good',$user);
    return response()->json('ffffff');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
