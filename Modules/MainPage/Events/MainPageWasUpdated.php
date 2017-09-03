<?php

namespace Modules\MainPage\Events;

use Modules\MainPage\Entities\Mainpage;
use Modules\Media\Contracts\StoringMedia;

class MainPageWasUpdated implements StoringMedia
{

    public $data;

    public $mainpage;

    public function __construct(Mainpage $mainpage, array $data)
    {
        $this->data = $data;
        $this->mainpage = $mainpage;
    }

    public function getEntity()
    {
        return $this->mainpage;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}
