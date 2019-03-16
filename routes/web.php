<?php

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

/**
 * Routes for resource nasabah
 */
$router->post('nasabah', 'NasabahController@create');
$router->get('nasabah', 'NasabahController@read');
$router->get('nasabah/{id}', 'NasabahController@detail');
$router->post('nasabah/{id}', 'NasabahController@update');
$router->delete('nasabah/{id}', 'NasabahController@delete');

/**
 * Routes for resource bank
 */
$router->post('bank', 'BanksController@create');
$router->get('bank', 'BanksController@read');
$router->get('bank/{id}', 'BanksController@detail');
$router->post('bank/{id}', 'BanksController@update');
$router->delete('bank/{id}', 'BanksController@delete');