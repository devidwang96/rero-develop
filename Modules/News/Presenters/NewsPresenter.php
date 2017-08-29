<?php

namespace Modules\News\Presenters;

use Laracasts\Presenter\Presenter;
use Modules\News\Entities\Status;

class NewsPresenter extends Presenter
{
    protected $status;
    private $news;

    public function __construct($entity)
    {
        parent::__construct($entity);
        $this->news = app('Modules\News\Repositories\NewsRepository');
        $this->status = app('Modules\News\Entities\Status');
    }

    public function previous()
    {
        return $this->news->getPreviousOf($this->entity);
    }

    public function next()
    {
        return $this->news->getNextOf($this->entity);
    }

    public function status()
    {
        return $this->status->get($this->entity->status);
    }
    public function statusLabelClass()
    {
        switch ($this->entity->status) {
            case Status::DRAFT:
                return 'bg-red';
                break;
            case Status::PENDING:
                return 'bg-orange';
                break;
            case Status::PUBLISHED:
                return 'bg-green';
                break;
            case Status::UNPUBLISHED:
                return 'bg-purple';
                break;
            default:
                return 'bg-red';
                break;
        }
    }
}
