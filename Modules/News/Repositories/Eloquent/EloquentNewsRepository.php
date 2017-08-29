<?php

namespace Modules\News\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\News\Entities\News;
use Modules\News\Events\NewsIsCreating;
use Modules\News\Events\NewsIsUpdating;
use Modules\News\Events\NewsWasCreated;
use Modules\News\Events\NewsWasDeleted;
use Modules\News\Events\NewsWasUpdated;
use Modules\News\Repositories\Collection;


use Modules\News\Repositories\NewsRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentNewsRepository extends EloquentBaseRepository implements NewsRepository
{
    /**
     * @param  int    $id
     * @return object
     */
    public function find($id)
    {
        return $this->model->with('translations')->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->with('translations')->orderBy('created_at', 'DESC')->get();
    }

    /**
     * Update a resource
     * @param $news
     * @param  array $data
     * @return mixed
     */
    public function update($news, $data)
    {
        event($event = new NewsIsUpdating($news, $data));
        $news->update($event->getAttributes());

        event(new NewsWasUpdated($news, $data));

        return $news;
    }

    /**
     * Create a news news
     * @param  array $data
     * @return News
     */
    public function create($data)
    {
        event($event = new NewsIsCreating($data));
        $news = $this->model->create($event->getAttributes());


        event(new NewsWasCreated($news, $data));

        return $news;
    }


    public function destroy($model)
    {
        event(new NewsWasDeleted($model->id, get_class($model)));

        return $model->delete();
    }

    /**
     * Return all resources in the given language
     *
     * @param  string                                   $lang
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allTranslatedIn($lang)
    {
        return $this->model->whereHas('translations', function (Builder $q) use ($lang) {
            $q->where('locale', "$lang");
            $q->where('title', '!=', '');
        })->with('translations')->whereStatus(Status::PUBLISHED)->orderBy('created_at', 'DESC')->get();
    }

    /**
     * Return the latest x news news
     * @param int $amount
     * @return Collection
     */
    public function latest($amount = 5)
    {
        return $this->model->whereStatus(Status::PUBLISHED)->orderBy('created_at', 'desc')->take($amount)->get();
    }

    /**
     * Get the previous news of the given news
     * @param object $news
     * @return object
     */
    public function getPreviousOf($news)
    {
        return $this->model->where('created_at', '<', $news->created_at)
            ->whereStatus(Status::PUBLISHED)->orderBy('created_at', 'desc')->first();
    }

    /**
     * Get the next news of the given news
     * @param object $news
     * @return object
     */
    public function getNextOf($news)
    {
        return $this->model->where('created_at', '>', $news->created_at)
            ->whereStatus(Status::PUBLISHED)->first();
    }

    /**
     * Find a resource by the given id
     *
     * @param  string $id
     * @return object
     */
    public function findById($id)
    {
        return $this->model->whereHas('translations', function (Builder $q) use ($id) {
            $q->where('id', "$id");
        })->with('translations')->whereStatus(Status::PUBLISHED)->firstOrFail();
    }
}
