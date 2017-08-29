<?php

namespace Modules\Dishes\Events;

use Modules\Dishes\Entities\Dish;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class DishIsUpdating extends AbstractEntityHook implements EntityIsChanging
{
    private $dish;

    public function __construct(Dishes $dish, array $data)
    {
        parent::__construct($data);

        $this->dish = $dish;
    }

    public function getDishes()
    {
        return $this->dish;
    }
}
