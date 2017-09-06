<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/orders'], function (Router $router) {
    $router->bind('order', function ($id) {
        return app('Modules\Orders\Repositories\OrderRepository')->find($id);
    });
    $router->get('orders', [
        'as' => 'admin.orders.order.index',
        'uses' => 'OrderController@index',
        'middleware' => 'can:orders.orders.index'
    ]);
    $router->get('orders/create', [
        'as' => 'admin.orders.order.create',
        'uses' => 'OrderController@create',
        'middleware' => 'can:orders.orders.create'
    ]);
    $router->post('orders', [
        'as' => 'admin.orders.order.store',
        'uses' => 'OrderController@store',
        'middleware' => 'can:orders.orders.create'
    ]);
    $router->get('orders/{order}/edit', [
        'as' => 'admin.orders.order.edit',
        'uses' => 'OrderController@edit',
        'middleware' => 'can:orders.orders.edit'
    ]);
    $router->put('orders/{order}', [
        'as' => 'admin.orders.order.update',
        'uses' => 'OrderController@update',
        'middleware' => 'can:orders.orders.edit'
    ]);
    $router->delete('orders/{order}', [
        'as' => 'admin.orders.order.destroy',
        'uses' => 'OrderController@destroy',
        'middleware' => 'can:orders.orders.destroy'
    ]);
// append

});
