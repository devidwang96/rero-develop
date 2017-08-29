<?php

namespace Modules\Dishes\Events;

use Modules\Dishes\Entities\DishCategory;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class DishesCategoryIsUpdating extends AbstractEntityHook implements EntityIsChanging
{
    private $_category;

    public function __construct(DishCategory $_category, array $data)
    {
        parent::__construct($data);

        $this->_category = $_category;
    }

    public function getDishes()
    {
        return $this->_category;
    }
}
