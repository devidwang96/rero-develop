<?php

namespace Modules\Mats\Events;

use Modules\Media\Contracts\DeletingMedia;

class MatWasDeleted implements DeletingMedia
{
    /**
     * @var string
     */
    private $matClass;
    /**
     * @var int
     */
    private $matId;

    public function __construct($matId, $matClass)
    {
        $this->matClass = $matClass;
        $this->matId = $matId;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->matId;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->matClass;
    }
}
