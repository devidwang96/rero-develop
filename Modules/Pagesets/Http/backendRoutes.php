<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/pagesets'], function (Router $router) {
    $router->bind('sets', function ($id) {
        return app('Modules\Pagesets\Repositories\SetsRepository')->find($id);
    });
    $router->get('sets', [
        'as' => 'admin.pagesets.sets.index',
        'uses' => 'SetsController@index',
        'middleware' => 'can:pagesets.sets.index'
    ]);
    $router->get('sets/create', [
        'as' => 'admin.pagesets.sets.create',
        'uses' => 'SetsController@create',
        'middleware' => 'can:pagesets.sets.create'
    ]);
    $router->post('sets', [
        'as' => 'admin.pagesets.sets.store',
        'uses' => 'SetsController@store',
        'middleware' => 'can:pagesets.sets.create'
    ]);
    $router->get('sets/{sets}/edit', [
        'as' => 'admin.pagesets.sets.edit',
        'uses' => 'SetsController@edit',
        'middleware' => 'can:pagesets.sets.edit'
    ]);
    $router->put('sets/{sets}', [
        'as' => 'admin.pagesets.sets.update',
        'uses' => 'SetsController@update',
        'middleware' => 'can:pagesets.sets.edit'
    ]);
    $router->delete('sets/{sets}', [
        'as' => 'admin.pagesets.sets.destroy',
        'uses' => 'SetsController@destroy',
        'middleware' => 'can:pagesets.sets.destroy'
    ]);
// append

});
