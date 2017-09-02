<?php

namespace Modules\Dishes\Events;

use Modules\Dishes\Entities\DishCategory;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class DishesCategoryIsUpdating extends AbstractEntityHook implements EntityIsChanging
{
    private $dish_category;

    public function __construct(DishCategory $dish_category, array $data)
    {
        parent::__construct($data);

        $this->dish_category = $dish_category;
    }

    public function getDishes()
    {
        return $this->dish_category;
    }
}
