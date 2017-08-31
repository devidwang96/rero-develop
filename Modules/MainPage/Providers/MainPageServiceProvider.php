<?php

namespace Modules\MainPage\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\MainPage\Events\Handlers\RegisterMainPageSidebar;

class MainPageServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterMainPageSidebar::class);
    }

    public function boot()
    {
        $this->publishConfig('mainpage', 'permissions');

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
            'Modules\MainPage\Repositories\MainpageRepository',
            function () {
                $repository = new \Modules\MainPage\Repositories\Eloquent\EloquentMainpageRepository(new \Modules\MainPage\Entities\Mainpage());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\MainPage\Repositories\Cache\CacheMainpageDecorator($repository);
            }
        );
// add bindings

    }
}
