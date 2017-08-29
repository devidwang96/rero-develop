<?php

namespace Modules\News\Events;

use Modules\News\Entities\News;
use Modules\Media\Contracts\StoringMedia;

class NewsWasUpdated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var News
     */
    public $news;

    public function __construct(News $news, array $data)
    {
        $this->data = $data;
        $this->news = $news;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->news;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}
