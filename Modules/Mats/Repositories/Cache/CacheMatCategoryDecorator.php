<?php

namespace Modules\Mats\Repositories\Cache;

use Modules\Mats\Repositories\MatCategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheMatCategoryDecorator extends BaseCacheDecorator implements MatCategoryRepository
{
    public function __construct(MatCategoryRepository $matcategory)
    {
        parent::__construct();
        $this->entityName = 'mats.matcategories';
        $this->repository = $matcategory;
    }
}
