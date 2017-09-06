<?php

namespace Modules\Mats\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Mats\Repositories\MatRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

use Modules\Mats\Events\MatIsCreating;
use Modules\Mats\Events\MatIsUpdating;
use Modules\Mats\Events\MatWasCreated;
use Modules\Mats\Events\MatWasDeleted;
use Modules\Mats\Events\MatWasUpdated;

class EloquentMatRepository extends EloquentBaseRepository implements MatRepository
{
    public function find($id)
    {
        return $this->model->with('translations')->find($id);
    }

    public function all()
    {
        return $this->model->with('translations')->orderBy('created_at', 'DESC')->get();
    }

    public function update($mat, $data)
    {
        event($event = new MatIsUpdating($mat, $data));
        $mat->update($event->getAttributes());

        event(new MatWasUpdated($mat, $data));

        return $mat;
    }

    public function create($data)
    {
        event($event = new MatIsCreating($data));
        $mat = $this->model->create($event->getAttributes());


        event(new MatWasCreated($mat, $data));

        return $mat;
    }

    public function findById($id)
    {
        return $this->model->whereHas('translations', function (Builder $q) use ($id) {
            $q->where('id', "$id");
        })->with('translations')->whereStatus(Status::PUBLISHED)->firstOrFail();
    }

    public function destroy($model)
    {
        event(new MatWasDeleted($model->id, get_class($model)));

        return $model->delete();
    }
}
