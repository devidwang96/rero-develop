<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/feedbacks'], function (Router $router) {
    $router->bind('feedback', function ($id) {
        return app('Modules\Feedbacks\Repositories\FeedbackRepository')->find($id);
    });
    $router->get('feedback', [
        'as' => 'admin.feedbacks.feedback.index',
        'uses' => 'FeedbackController@index',
        'middleware' => 'can:feedbacks.feedback.index'
    ]);
    $router->get('feedback/create', [
        'as' => 'admin.feedbacks.feedback.create',
        'uses' => 'FeedbackController@create',
        'middleware' => 'can:feedbacks.feedback.create'
    ]);
    $router->post('feedback/admincreate', [
        'as' => 'admin.feedbacks.feedback.store',
        'uses' => 'FeedbackController@store',
        'middleware' => 'can:feedbacks.feedback.create'
    ]);

//    $router->post('feedback/usercreate', [
//        'as' => 'admin.feedbacks.feedback.user_store',
//        'uses' => 'FeedbackUserController@user_create'
//    ]);

    $router->get('feedback/{feedback}/edit', [
        'as' => 'admin.feedbacks.feedback.edit',
        'uses' => 'FeedbackController@edit',
        'middleware' => 'can:feedbacks.feedback.edit'
    ]);
    $router->put('feedback/{feedback}', [
        'as' => 'admin.feedbacks.feedback.update',
        'uses' => 'FeedbackController@update',
        'middleware' => 'can:feedbacks.feedback.edit'
    ]);
    $router->delete('feedback/{feedback}', [
        'as' => 'admin.feedbacks.feedback.destroy',
        'uses' => 'FeedbackController@destroy',
        'middleware' => 'can:feedbacks.feedback.destroy'
    ]);
});
