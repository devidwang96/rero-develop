<?php

namespace Modules\News\Events;

use Modules\Media\Contracts\DeletingMedia;

class NewsWasDeleted implements DeletingMedia
{
    /**
     * @var string
     */
    private $newsClass;
    /**
     * @var int
     */
    private $newsId;

    public function __construct($newsId, $newsClass)
    {
        $this->newsClass = $newsClass;
        $this->newsId = $newsId;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->newsId;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->newsClass;
    }
}
