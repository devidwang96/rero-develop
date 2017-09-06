<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/mats'], function (Router $router) {
    $router->bind('mat', function ($id) {
        return app('Modules\Mats\Repositories\MatRepository')->find($id);
    });
    $router->get('mats', [
        'as' => 'admin.mats.mat.index',
        'uses' => 'MatController@index',
        'middleware' => 'can:mats.mats.index'
    ]);
    $router->get('mats/create', [
        'as' => 'admin.mats.mat.create',
        'uses' => 'MatController@create',
        'middleware' => 'can:mats.mats.create'
    ]);
    $router->post('mats', [
        'as' => 'admin.mats.mat.store',
        'uses' => 'MatController@store',
        'middleware' => 'can:mats.mats.create'
    ]);
    $router->get('mats/{mat}/edit', [
        'as' => 'admin.mats.mat.edit',
        'uses' => 'MatController@edit',
        'middleware' => 'can:mats.mats.edit'
    ]);
    $router->put('mats/{mat}', [
        'as' => 'admin.mats.mat.update',
        'uses' => 'MatController@update',
        'middleware' => 'can:mats.mats.edit'
    ]);
    $router->delete('mats/{mat}', [
        'as' => 'admin.mats.mat.destroy',
        'uses' => 'MatController@destroy',
        'middleware' => 'can:mats.mats.destroy'
    ]);
    $router->bind('matcategory', function ($id) {
        return app('Modules\Mats\Repositories\MatCategoryRepository')->find($id);
    });
    $router->get('matcategories', [
        'as' => 'admin.mats.matcategory.index',
        'uses' => 'MatCategoryController@index',
        'middleware' => 'can:mats.matcategories.index'
    ]);
    $router->get('matcategories/create', [
        'as' => 'admin.mats.matcategory.create',
        'uses' => 'MatCategoryController@create',
        'middleware' => 'can:mats.matcategories.create'
    ]);
    $router->post('matcategories', [
        'as' => 'admin.mats.matcategory.store',
        'uses' => 'MatCategoryController@store',
        'middleware' => 'can:mats.matcategories.create'
    ]);
    $router->get('matcategories/{matcategory}/edit', [
        'as' => 'admin.mats.matcategory.edit',
        'uses' => 'MatCategoryController@edit',
        'middleware' => 'can:mats.matcategories.edit'
    ]);
    $router->put('matcategories/{matcategory}', [
        'as' => 'admin.mats.matcategory.update',
        'uses' => 'MatCategoryController@update',
        'middleware' => 'can:mats.matcategories.edit'
    ]);
    $router->delete('matcategories/{matcategory}', [
        'as' => 'admin.mats.matcategory.destroy',
        'uses' => 'MatCategoryController@destroy',
        'middleware' => 'can:mats.matcategories.destroy'
    ]);
// append


});
