<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/mainpage'], function (Router $router) {
    $router->bind('mainpage', function ($id) {
        return app('Modules\MainPage\Repositories\MainpageRepository')->find($id);
    });
    $router->get('mainpages', [
        'as' => 'admin.mainpage.mainpage.index',
        'uses' => 'MainpageController@index',
        'middleware' => 'can:mainpage.mainpages.index'
    ]);
    $router->get('mainpages/{mainpage}/edit', [
        'as' => 'admin.mainpage.mainpage.edit',
        'uses' => 'MainpageController@edit',
        'middleware' => 'can:mainpage.mainpages.edit'
    ]);
    $router->put('mainpages/{mainpage}', [
        'as' => 'admin.mainpage.mainpage.update',
        'uses' => 'MainpageController@update',
        'middleware' => 'can:mainpage.mainpages.edit'
    ]);
// append

});
