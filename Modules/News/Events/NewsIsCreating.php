<?php

namespace Modules\News\Events;

use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class NewsIsCreating extends AbstractEntityHook implements EntityIsChanging
{
}