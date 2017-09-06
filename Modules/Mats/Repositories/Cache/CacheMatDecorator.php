<?php

namespace Modules\Mats\Repositories\Cache;

use Modules\Mats\Repositories\MatRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheMatDecorator extends BaseCacheDecorator implements MatRepository
{
    public function __construct(MatRepository $mat)
    {
        parent::__construct();
        $this->entityName = 'mats.mats';
        $this->repository = $mat;
    }
}
