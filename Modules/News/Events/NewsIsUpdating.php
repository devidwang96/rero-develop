<?php

namespace Modules\News\Events;

use Modules\News\Entities\News;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class NewsIsUpdating extends AbstractEntityHook implements EntityIsChanging
{
    /**
     * @var News
     */
    private $news;

    public function __construct(News $news, array $data)
    {
        parent::__construct($data);

        $this->news = $news;
    }

    /**
     * @return News
     */
    public function getNews()
    {
        return $this->news;
    }
}
