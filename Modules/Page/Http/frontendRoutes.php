<?php

use Illuminate\Routing\Router;

/** @var Router $router */
if (! App::runningInConsole()) {
    $router->get('/', [
        'uses' => 'PublicController@homepage',
        'as' => 'homepage',
        'middleware' => config('asgard.page.config.middleware'),
    ]);
    $router->post('/feedback/usercreate', [
        'uses' => 'PublicController@feedback_user_create',
        'as' => 'user_create_feedback'
    ]);

    $router->post('/order/usercreate', [
        'uses' => 'PublicController@order_user_create',
        'as' => 'user_create_order'
    ]);


    $router->get('/menu', [
        'uses' => 'PublicController@menu',
        'as' => 'menu',
        'middleware' => config('asgard.page.config.middleware'),
    ]);
    $router->get('/news', [
        'uses' => 'PublicController@news',
        'as' => 'news',
        'middleware' => config('asgard.page.config.middleware'),
    ]);
    $router->get('/news/{id}', [
        'uses' => 'PublicController@newsInner',
        'as' => 'news-inner',
        'middleware' => config('asgard.page.config.middleware'),
    ]);
    $router->get('/gallery', [
        'uses' => 'PublicController@gallery',
        'as' => 'gallery',
        'middleware' => config('asgard.page.config.middleware'),
    ]);
    $router->get('/collective', [
        'uses' => 'PublicController@collective',
        'as' => 'collective',
        'middleware' => config('asgard.page.config.middleware'),
    ]);
    $router->get('/events', [
        'uses' => 'PublicController@events',
        'as' => 'events',
        'middleware' => config('asgard.page.config.middleware'),
    ]);
    $router->get('/events/{id}', [
        'uses' => 'PublicController@eventsInner',
        'as' => 'events-inner',
        'middleware' => config('asgard.page.config.middleware'),
    ]);
    $router->any('{uri}', [
        'uses' => 'PublicController@uri',
        'as' => 'page',
        'middleware' => config('asgard.page.config.middleware'),
    ])->where('uri', '.*');
}
