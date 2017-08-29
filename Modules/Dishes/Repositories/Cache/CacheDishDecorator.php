<?php

namespace Modules\Dishes\Repositories\Cache;

use Modules\Dishes\Repositories\DishRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDishDecorator extends BaseCacheDecorator implements DishRepository
{
    public function __construct(DishRepository $dish)
    {
        parent::__construct();
        $this->entityName = 'dishes.dishes';
        $this->repository = $dish;
    }
}
