<?php

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

$controllers = [

];

Route::group(['namespace' => 'Api'], function () use ($controllers) {
    foreach ($controllers as $controllerClass) {
        $controller = $controllerClass::getClassName();

        Route::group(['prefix' => $controllerClass::getRoutePrefix()], function () use ($controller) {
            Route::get('/', "{$controller}@index");
            Route::get('{id}', "{$controller}@show");

            Route::group(['middleware' => 'auth:api'], function () use ($controller) {
                Route::post('/', "{$controller}@store");
                Route::match(['post', 'patch'], '{id}', "{$controller}@update");
                Route::delete('{id}', "{$controller}@destroy");
            });
        });
    }
});
