<?php

namespace Modules\Mats\Events;

use Modules\Mats\Entities\MatCategory;
use Modules\Media\Contracts\StoringMedia;

class MatsCategoryWasUpdated implements StoringMedia
{

    public $data;

    public $mat_category;

    public function __construct(MatCategory $mat_category, array $data)
    {
        $this->data = $data;
        $this->mat_category = $mat_category;
    }

    public function getEntity()
    {
        return $this->mat_category;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}
