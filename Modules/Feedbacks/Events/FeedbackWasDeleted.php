<?php

namespace Modules\Feedbacks\Events;

use Modules\Media\Contracts\DeletingMedia;

class FeedbackWasDeleted implements DeletingMedia
{
    /**
     * @var string
     */
    private $feedbackClass;
    /**
     * @var int
     */
    private $feedbackId;

    public function __construct($feedbackId, $feedbackClass)
    {
        $this->feedbackClass = $feedbackClass;
        $this->feedbackId = $feedbackId;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->feedbackId;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->feedbackClass;
    }
}
