<?php

namespace Modules\Dishes\Repositories\Cache;

use Modules\Dishes\Repositories\DishCategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDishCategoryDecorator extends BaseCacheDecorator implements DishCategoryRepository
{
    public function __construct(DishCategoryRepository $dishcategory)
    {
        parent::__construct();
        $this->entityName = 'dishes.dishcategories';
        $this->repository = $dishcategory;
    }
}
