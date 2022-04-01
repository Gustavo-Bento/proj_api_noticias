<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router -> group(['prefix' => 'api/v1' , 'namespace' => 'Author'], function () use ($router){
    $router -> post('/autores',[
        'uses' => 'AuthorController@create'
    ]);
    $router -> get ('/autores',[
        'uses' => 'AuthorController@findAll'
    ]);
    $router -> get('/autores/{id}',[
        'uses' => 'AuthorController@findOneBy'
    ]);
    $router -> put('/autores/{param}', [
        'uses' => 'AuthorController@editBy'
    ]);
    $router -> patch('/autores/{param}', [
        'uses' => 'AuthorController@editBy'
    ]);
    $router -> delete('/autores/{id}', [
        'uses' => 'AuthorController@delete'
    ]);
});