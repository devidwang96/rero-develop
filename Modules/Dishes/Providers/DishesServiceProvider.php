<?php

namespace Modules\Dishes\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Dishes\Events\Handlers\RegisterDishesSidebar;

use Modules\Media\Image\ThumbnailManager;

class DishesServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterDishesSidebar::class);
    }

    public function boot()
    {
        $this->publishConfig('dishes', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->registerThumbnails();
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
            'Modules\Dishes\Repositories\DishRepository',
            function () {
                $repository = new \Modules\Dishes\Repositories\Eloquent\EloquentDishRepository(new \Modules\Dishes\Entities\Dish());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Dishes\Repositories\Cache\CacheDishDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Dishes\Repositories\DishCategoryRepository',
            function () {
                $repository = new \Modules\Dishes\Repositories\Eloquent\EloquentDishCategoryRepository(new \Modules\Dishes\Entities\DishCategory());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Dishes\Repositories\Cache\CacheDishCategoryDecorator($repository);
            }
        );
// add bindings


    }

    private function registerThumbnails()
    {
        $this->app[ThumbnailManager::class]->registerThumbnail('DishesOnMainThumb', [
            'fit' => [
                'width' => '250',
                'height' => '250',
                'callback' => function ($constraint) {
                    $constraint->upsize();
                },
            ],
        ]);

        $this->app[ThumbnailManager::class]->registerThumbnail('DishesCategoryOnMainThumb', [
            'fit' => [
                'width' => '300',
                'height' => '250',
                'callback' => function ($constraint) {
                    $constraint->upsize();
                },
            ],
        ]);
    }


}
