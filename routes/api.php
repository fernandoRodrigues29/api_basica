<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
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
    $response = new Illuminate\Http\Response(json_encode(['hash 123 '=> Hash::make(123)]));
    $response->header('Content-Type','aplication/json');
    return $response;
});

Route::get('/tirateima', function () {
    return 'costela bovina na panela de presão e bom demais';
});

// Route::group(['middleware'=>'auth'],function(){
//     Route::get('/foo', function () {
//         return 'mensagem de sucesso';
//     });
// });

Route::group(['middleware'=>'apiJwt'],function(){
    Route::get('/foo', function () {
        return 'mensagem de sucesso';
    });
});



// Route::namespace('apix')->group( ['middleware'=>['jwt.auth']] ,function(){
//     Route::get('/foo', function () {
//         return 'costela bovina na panela de presão e bom demais';
//     });
// });


//Product Routs
Route::namespace('Api')->group(function(){
    Route::post('/login','Auth\\LoginJwtController@login');
    Route::get('/products','ProductController@index');
    Route::get('/products/{id}','ProductController@show');
    Route::post('/products','ProductController@save');
    Route::put('/products','ProductController@update');
    Route::delete('/products/{id}','ProductController@delete');
});
//Authenticate routes
// Route::namespace('Apix')->group(['middleware'=>['jwt.auth']],function(){
    
    Route::namespace('Biro')->group(function(){
        Route::get('/teste',function(){
           return 'controle de tela';
        });
    });
