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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//apiPais
Route::get('/pais/get', 'PaisController@getPaises');
Route::get('/pais/find/{id}','PaisController@getPais');
Route::post('/pais', 'PaisController@crearPais');
Route::put('/pais', 'PaisController@editarPais');
Route::delete('/pais', 'PaisController@eliminarPais');
