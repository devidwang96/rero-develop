<?php

namespace Modules\Mats\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Mats\Repositories\MatCategoryRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

use Modules\Mats\Events\MatsCategoryIsCreating;
use Modules\Mats\Events\MatsCategoryIsUpdating;
use Modules\Mats\Events\MatsCategoryWasCreated;
use Modules\Mats\Events\MatsCategoryWasDeleted;
use Modules\Mats\Events\MatsCategoryWasUpdated;

class EloquentMatCategoryRepository extends EloquentBaseRepository implements MatCategoryRepository
{
    public function find($id)
    {
        return $this->model->with('translations')->find($id);
    }

    public function all()
    {
        return $this->model->with('translations')->orderBy('created_at', 'DESC')->get();
    }

    public function update($mat_category, $data)
    {
        event($event = new MatsCategoryIsUpdating($mat_category, $data));
        $mat_category->update($event->getAttributes());

        event(new MatsCategoryWasUpdated($mat_category, $data));

        return $mat_category;
    }

    public function create($data)
    {
        event($event = new MatsCategoryIsCreating($data));
        $mat_category = $this->model->create($event->getAttributes());


        event(new MatsCategoryWasCreated($mat_category, $data));

        return $mat_category;
    }

    public function findById($id)
    {
        return $this->model->whereHas('translations', function (Builder $q) use ($id) {
            $q->where('id', "$id");
        })->with('translations')->whereStatus(Status::PUBLISHED)->firstOrFail();
    }

    public function destroy($model)
    {
        event(new MatsCategoryWasDeleted($model->id, get_class($model)));

        return $model->delete();
    }

}
