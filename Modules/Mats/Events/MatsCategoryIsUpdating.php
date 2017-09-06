<?php

namespace Modules\Mats\Events;

use Modules\Mats\Entities\MatCategory;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class MatsCategoryIsUpdating extends AbstractEntityHook implements EntityIsChanging
{
    private $mat_category;

    public function __construct(MatCategory $mat_category, array $data)
    {
        parent::__construct($data);

        $this->mat_category = $mat_category;
    }

    public function getMats()
    {
        return $this->mat_category;
    }
}
