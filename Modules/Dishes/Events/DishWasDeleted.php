<?php

namespace Modules\Dishes\Events;

use Modules\Media\Contracts\DeletingMedia;

class DishWasDeleted implements DeletingMedia
{
    /**
     * @var string
     */
    private $dishClass;
    /**
     * @var int
     */
    private $dishId;

    public function __construct($dishId, $dishClass)
    {
        $this->dishClass = $dishClass;
        $this->dishId = $dishId;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->dishId;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->dishClass;
    }
}
