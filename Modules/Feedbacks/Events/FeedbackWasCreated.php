<?php

namespace Modules\Feedbacks\Events;

use Modules\Feedbacks\Entities\Feedback;
use Modules\Media\Contracts\StoringMedia;

class FeedbackWasCreated implements StoringMedia
{
    public $data;
    public $feedback;

    public function __construct($feedback, array $data)
    {
        $this->data = $data;
        $this->feedback = $feedback;
    }

    public function getEntity()
    {
        return $this->feedback;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}
