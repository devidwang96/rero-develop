<?php

namespace Modules\Dishes\Events;

use Modules\Dishes\Entities\Dish;
use Modules\Media\Contracts\StoringMedia;

class DishWasUpdated implements StoringMedia
{

    public $data;

    public $dish;

    public function __construct(Dish $dish, array $data)
    {
        $this->data = $data;
        $this->dish = $dish;
    }

    public function getEntity()
    {
        return $this->dish;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}
