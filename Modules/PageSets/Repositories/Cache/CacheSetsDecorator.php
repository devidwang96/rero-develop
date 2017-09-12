<?php

namespace Modules\PageSets\Repositories\Cache;

use Modules\PageSets\Repositories\SetsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSetsDecorator extends BaseCacheDecorator implements SetsRepository
{
    public function __construct(SetsRepository $sets)
    {
        parent::__construct();
        $this->entityName = 'pagesets.sets';
        $this->repository = $sets;
    }
}
