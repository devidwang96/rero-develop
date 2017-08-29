<?php

namespace Modules\News\Events;

use Modules\News\Entities\News;
use Modules\Media\Contracts\StoringMedia;

class NewsWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;

    public $news;

    public function __construct($news, array $data)
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
