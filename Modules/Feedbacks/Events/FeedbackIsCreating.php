<?php

namespace Modules\Feedbacks\Events;

use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class FeedbackIsCreating extends AbstractEntityHook implements EntityIsChanging
{

}
