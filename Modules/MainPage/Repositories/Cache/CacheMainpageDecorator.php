<?php

namespace Modules\MainPage\Repositories\Cache;

use Modules\MainPage\Repositories\MainpageRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheMainpageDecorator extends BaseCacheDecorator implements MainpageRepository
{
    public function __construct(MainpageRepository $mainpage)
    {
        parent::__construct();
        $this->entityName = 'mainpage.mainpages';
        $this->repository = $mainpage;
    }
}
