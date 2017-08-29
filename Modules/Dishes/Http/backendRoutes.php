<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/dishes'], function (Router $router) {
    $router->bind('dish', function ($id) {
        return app('Modules\Dishes\Repositories\DishRepository')->find($id);
    });
    $router->get('dishes', [
        'as' => 'admin.dishes.dish.index',
        'uses' => 'DishController@index',
        'middleware' => 'can:dishes.dishes.index'
    ]);
    $router->get('dishes/create', [
        'as' => 'admin.dishes.dish.create',
        'uses' => 'DishController@create',
        'middleware' => 'can:dishes.dishes.create'
    ]);
    $router->post('dishes', [
        'as' => 'admin.dishes.dish.store',
        'uses' => 'DishController@store',
        'middleware' => 'can:dishes.dishes.create'
    ]);
    $router->get('dishes/{dish}/edit', [
        'as' => 'admin.dishes.dish.edit',
        'uses' => 'DishController@edit',
        'middleware' => 'can:dishes.dishes.edit'
    ]);
    $router->put('dishes/{dish}', [
        'as' => 'admin.dishes.dish.update',
        'uses' => 'DishController@update',
        'middleware' => 'can:dishes.dishes.edit'
    ]);
    $router->delete('dishes/{dish}', [
        'as' => 'admin.dishes.dish.destroy',
        'uses' => 'DishController@destroy',
        'middleware' => 'can:dishes.dishes.destroy'
    ]);
    $router->bind('dishcategory', function ($id) {
        return app('Modules\Dishes\Repositories\DishCategoryRepository')->find($id);
    });
    $router->get('dishcategories', [
        'as' => 'admin.dishes.dishcategory.index',
        'uses' => 'DishCategoryController@index',
        'middleware' => 'can:dishes.dishcategories.index'
    ]);
    $router->get('dishcategories/create', [
        'as' => 'admin.dishes.dishcategory.create',
        'uses' => 'DishCategoryController@create',
        'middleware' => 'can:dishes.dishcategories.create'
    ]);
    $router->post('dishcategories', [
        'as' => 'admin.dishes.dishcategory.store',
        'uses' => 'DishCategoryController@store',
        'middleware' => 'can:dishes.dishcategories.create'
    ]);
    $router->get('dishcategories/{dishcategory}/edit', [
        'as' => 'admin.dishes.dishcategory.edit',
        'uses' => 'DishCategoryController@edit',
        'middleware' => 'can:dishes.dishcategories.edit'
    ]);
    $router->put('dishcategories/{dishcategory}', [
        'as' => 'admin.dishes.dishcategory.update',
        'uses' => 'DishCategoryController@update',
        'middleware' => 'can:dishes.dishcategories.edit'
    ]);
    $router->delete('dishcategories/{dishcategory}', [
        'as' => 'admin.dishes.dishcategory.destroy',
        'uses' => 'DishCategoryController@destroy',
        'middleware' => 'can:dishes.dishcategories.destroy'
    ]);
// append


});
