<?php

namespace Modules\Feedbacks\Repositories\Cache;

use Modules\Feedbacks\Repositories\FeedbackRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFeedbackDecorator extends BaseCacheDecorator implements FeedbackRepository
{
    public function __construct(FeedbackRepository $feedback)
    {
        parent::__construct();
        $this->entityName = 'feedbacks.feedback';
        $this->repository = $feedback;
    }
}
