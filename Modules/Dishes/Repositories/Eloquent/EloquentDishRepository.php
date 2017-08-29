<?php

namespace Modules\Dishes\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Dishes\Repositories\DishRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

use Modules\Dishes\Events\DishIsCreating;
use Modules\Dishes\Events\DishIsUpdating;
use Modules\Dishes\Events\DishWasCreated;
use Modules\Dishes\Events\DishWasDeleted;
use Modules\Dishes\Events\DishWasUpdated;

class EloquentDishRepository extends EloquentBaseRepository implements DishRepository
{
    public function find($id)
    {
        return $this->model->with('translations')->find($id);
    }

    public function all()
    {
        return $this->model->with('translations')->orderBy('created_at', 'DESC')->get();
    }

    public function update($dish, $data)
    {
        event($event = new DishIsUpdating($dish, $data));
        $dish->update($event->getAttributes());

        event(new DishWasUpdated($dish, $data));

        return $dish;
    }

    public function create($data)
    {
        event($event = new DishIsCreating($data));
        $dish = $this->model->create($event->getAttributes());


        event(new DishWasCreated($dish, $data));

        return $dish;
    }

    public function findById($id)
    {
        return $this->model->whereHas('translations', function (Builder $q) use ($id) {
            $q->where('id', "$id");
        })->with('translations')->whereStatus(Status::PUBLISHED)->firstOrFail();
    }

    public function destroy($model)
    {
        event(new DishWasDeleted($model->id, get_class($model)));

        return $model->delete();
    }

}
