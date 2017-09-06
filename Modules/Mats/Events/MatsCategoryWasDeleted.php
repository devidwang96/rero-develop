<?php

namespace Modules\Mats\Events;

use Modules\Media\Contracts\DeletingMedia;

class MatsCategoryWasDeleted implements DeletingMedia
{
    /**
     * @var string
     */
    private $mat_categoryClass;
    /**
     * @var int
     */
    private $mat_categoryId;

    public function __construct($mat_categoryId, $mat_categoryClass)
    {
        $this->mat_categoryClass = $mat_categoryClass;
        $this->mat_categoryId = $mat_categoryId;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->mat_categoryId;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->mat_categoryClass;
    }
}
