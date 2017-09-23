<?php

namespace Modules\Pagesets\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Pagesets\Events\Handlers\RegisterPagesetsSidebar;

use Modules\Media\Image\ThumbnailManager;

class PagesetsServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterPagesetsSidebar::class);
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
            'Modules\Pagesets\Repositories\SetsRepository',
            function () {
                $repository = new \Modules\Pagesets\Repositories\Eloquent\EloquentSetsRepository(new \Modules\Pagesets\Entities\Sets());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Pagesets\Repositories\Cache\CacheSetsDecorator($repository);
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

        $this->app[ThumbnailManager::class]->registerThumbnail('PageBg', [
            'fit' => [
                'width' => '1920',
                'height' => '1200',
                'callback' => function ($constraint) {
                    $constraint->upsize();
                },
            ],
        ]);
    }
}
