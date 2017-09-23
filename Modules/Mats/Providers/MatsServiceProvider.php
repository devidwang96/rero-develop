<?php

namespace Modules\Mats\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Mats\Events\Handlers\RegisterMatsSidebar;

use Modules\Media\Image\ThumbnailManager;

class MatsServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterMatsSidebar::class);
    }

    public function boot()
    {
        $this->publishConfig('mats', 'permissions');

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
            'Modules\Mats\Repositories\MatRepository',
            function () {
                $repository = new \Modules\Mats\Repositories\Eloquent\EloquentMatRepository(new \Modules\Mats\Entities\Mat());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Mats\Repositories\Cache\CacheMatDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Mats\Repositories\MatCategoryRepository',
            function () {
                $repository = new \Modules\Mats\Repositories\Eloquent\EloquentMatCategoryRepository(new \Modules\Mats\Entities\MatCategory());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Mats\Repositories\Cache\CacheMatCategoryDecorator($repository);
            }
        );
// add bindings


    }

    private function registerThumbnails()
    {
        $this->app[ThumbnailManager::class]->registerThumbnail('NewsItemThumb', [
            'fit' => [
                'width' => '900',
                'height' => '600',
                'callback' => function ($constraint) {
                    $constraint->upsize();
                },
            ],
            'resize' => [
                'width' => 900,
                'height' => 600,
            ],
        ]);

        $this->app[ThumbnailManager::class]->registerThumbnail('EventsItemThumb', [
            'fit' => [
                'width' => '900',
                'height' => '600',
                'callback' => function ($constraint) {
                    $constraint->upsize();
                },
            ],
            'resize' => [
                'width' => 900,
                'height' => 600,
            ],
        ]);

        $this->app[ThumbnailManager::class]->registerThumbnail('CollectiveItemThumb', [
            'fit' => [
                'width' => '300',
                'height' => '500',
                'callback' => function ($constraint) {
                    $constraint->upsize();
                },
            ],
            'resize' => [
                'width' => 300,
                'height' => 500,
            ],
        ]);

        $this->app[ThumbnailManager::class]->registerThumbnail('GalleryItemThumb', [
            'fit' => [
                'width' => '300',
                'height' => '250',
                'callback' => function ($constraint) {
                    $constraint->upsize();
                },
            ]
        ]);


        $this->app[ThumbnailManager::class]->registerThumbnail('MatsCategoryOnMainThumb', [
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
