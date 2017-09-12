<?php

namespace Modules\PageSets\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\PageSets\Events\Handlers\RegisterPageSetsSidebar;

use Modules\Media\Image\ThumbnailManager;

class PageSetsServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterPageSetsSidebar::class);
    }

    public function boot()
    {
        $this->publishConfig('pagesets', 'permissions');

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
            'Modules\PageSets\Repositories\SetsRepository',
            function () {
                $repository = new \Modules\PageSets\Repositories\Eloquent\EloquentSetsRepository(new \Modules\PageSets\Entities\Sets());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\PageSets\Repositories\Cache\CacheSetsDecorator($repository);
            }
        );
    }

    private function registerThumbnails()
    {
        $this->app[ThumbnailManager::class]->registerThumbnail('MainGallery', [
            'fit' => [
                'width' => '200',
                'height' => '200',
                'callback' => function ($constraint) {
                    $constraint->upsize();
                },
            ],
        ]);
    }
}
