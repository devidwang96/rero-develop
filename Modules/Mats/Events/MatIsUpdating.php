<?php

namespace Modules\Mats\Events;

use Modules\Mats\Entities\Mat;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class MatIsUpdating extends AbstractEntityHook implements EntityIsChanging
{
    private $mat;

    public function __construct(Mat $mat, array $data)
    {
        parent::__construct($data);

        $this->mat = $mat;
    }

    public function getMats()
    {
        return $this->mat;
    }
}
