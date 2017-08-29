<?php

namespace Modules\Dishes\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Dishes\Repositories\DishCategoryRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

use Modules\Dishes\Events\DishesCategoryIsCreating;
use Modules\Dishes\Events\DishesCategoryIsUpdating;
use Modules\Dishes\Events\DishesCategoryWasCreated;
use Modules\Dishes\Events\DishesCategoryWasDeleted;
use Modules\Dishes\Events\DishesCategoryWasUpdated;

class EloquentDishCategoryRepository extends EloquentBaseRepository implements DishCategoryRepository
{
    public function find($id)
    {
        return $this->model->with('translations')->find($id);
    }

    public function all()
    {
        return $this->model->with('translations')->orderBy('created_at', 'DESC')->get();
    }

    public function update($dish_category, $data)
    {
        event($event = new DishesCategoryIsUpdating($dish_category, $data));
        $dish_category->update($event->getAttributes());

        event(new DishesCategoryWasUpdated($dish_category, $data));

        return $dish_category;
    }

    public function create($data)
    {
        event($event = new DishesCategoryIsCreating($data));
        $dish_category = $this->model->create($event->getAttributes());


        event(new DishesCategoryWasCreated($dish_category, $data));

        return $dish_category;
    }

    public function findById($id)
    {
        return $this->model->whereHas('translations', function (Builder $q) use ($id) {
            $q->where('id', "$id");
        })->with('translations')->whereStatus(Status::PUBLISHED)->firstOrFail();
    }

    public function destroy($model)
    {
        event(new DishesCategoryWasDeleted($model->id, get_class($model)));

        return $model->delete();
    }

}
