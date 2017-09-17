<?php

namespace Modules\Pagesets\Events;

use Modules\Pagesets\Entities\Sets;
use Modules\Media\Contracts\StoringMedia;

class PagesetsWasUpdated implements StoringMedia
{

    public $data;

    public $pagesets;

    public function __construct(Sets $pagesets, array $data)
    {
        $this->data = $data;
        $this->pagesets = $pagesets;
    }

    public function getEntity()
    {
        return $this->pagesets;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}
