<?php

namespace Modules\Dishes\Events;

use Modules\Dishes\Entities\DishCategory;
use Modules\Media\Contracts\StoringMedia;

class DishesCategoryWasUpdated implements StoringMedia
{

    public $data;

    public $dish_category;

    public function __construct(DishCategory $dish_category, array $data)
    {
        $this->data = $data;
        $this->dish_category = $dish_category;
    }

    public function getEntity()
    {
        return $this->dish_category;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}
