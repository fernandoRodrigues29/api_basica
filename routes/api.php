<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/teste',function(){
    $response = new Illuminate\Http\Response(json_encode(['msg'=>'mensagem padrão']));
    $response->header('Content-Type','aplication/json');
    return $response;
});

//Product Routs
Route::namespace('Api')->group(function(){
    Route::get('/products','ProductController@index');
    Route::get('/products/{id}','ProductController@show');
    Route::post('/products','ProductController@save');
    Route::put('/products','ProductController@update');
    Route::delete('/products/{id}','ProductController@delete');
});
