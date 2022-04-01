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

$router -> group(['prefix' => 'api/v1' , 'namespace' => 'V1\Author'], function () use ($router){
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


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router -> group(['prefix' => 'api/v1' , 'namespace' => 'V1\News'], function () use ($router){
    $router -> post('/noticias',[
        'uses' => 'NewsController@create'
    ]);
    $router -> get('/noticias',[
        'uses' => 'NewsController@findAll'
    ]);
    $router -> get('/noticias/autor/{author}',[
        'uses' => 'NewsController@findByAuthor'
    ]);
    $router -> get('/noticias/{param}',[
        'uses' => 'NewsController@findBy'
    ]);
    $router -> put('/noticias/{param}',[
        'uses' => 'NewsController@editBy'
    ]);
    $router -> patch('/noticias/{param}',[
        'uses' => 'NewsController@editBy'
    ]);
    $router -> delete('/noticias/{param}',[
        'uses' => 'NewsController@deleteBy'
    ]);
    $router -> delete('/noticias/{author}',[
        'uses' => 'NewsController@deleteByAuthor'
    ]);
});
