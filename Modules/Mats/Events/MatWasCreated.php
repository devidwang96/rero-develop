<?php

namespace Modules\Mats\Events;

use Modules\Mats\Entities\Mat;
use Modules\Media\Contracts\StoringMedia;

class MatWasCreated implements StoringMedia
{

    public $data;
    public $mat;

    public function __construct($mat, array $data)
    {
        $this->data = $data;
        $this->mat = $mat;
    }

    public function getEntity()
    {
        return $this->mat;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}
