<?php

namespace Modules\Dishes\Events;

use Modules\Media\Contracts\DeletingMedia;

class DishesCategoryWasDeleted implements DeletingMedia
{
    /**
     * @var string
     */
    private $dish_categoryClass;
    /**
     * @var int
     */
    private $dish_categoryId;

    public function __construct($dish_categoryId, $dish_categoryClass)
    {
        $this->dish_categoryClass = $dish_categoryClass;
        $this->dish_categoryId = $dish_categoryId;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->dish_categoryId;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->dish_categoryClass;
    }
}
