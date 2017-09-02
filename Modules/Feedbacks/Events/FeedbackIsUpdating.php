<?php

namespace Modules\Feedbacks\Events;

use Modules\Feedbacks\Entities\Feedback;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class FeedbackIsUpdating extends AbstractEntityHook implements EntityIsChanging
{
    private $feedback;

    public function __construct(Feedback $feedback, array $data)
    {
        parent::__construct($data);

        $this->feedback = $feedback;
    }

    public function getDishes()
    {
        return $this->feedback;
    }
}
