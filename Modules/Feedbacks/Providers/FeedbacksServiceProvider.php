<?php

namespace Modules\Feedbacks\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Feedbacks\Events\Handlers\RegisterFeedbacksSidebar;

class FeedbacksServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterFeedbacksSidebar::class);
    }

    public function boot()
    {
        $this->publishConfig('feedbacks', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Feedbacks\Repositories\FeedbackRepository',
            function () {
                $repository = new \Modules\Feedbacks\Repositories\Eloquent\EloquentFeedbackRepository(new \Modules\Feedbacks\Entities\Feedback());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Feedbacks\Repositories\Cache\CacheFeedbackDecorator($repository);
            }
        );
// add bindings

    }
}
