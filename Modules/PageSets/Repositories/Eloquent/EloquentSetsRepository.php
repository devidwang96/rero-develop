<?php

namespace Modules\PageSets\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\PageSets\Repositories\SetsRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

use Modules\PageSets\Events\PageSetsWasUpdated;


class EloquentSetsRepository extends EloquentBaseRepository implements SetsRepository
{
    public function update($pagesets, $data)
    {
        $pagesets->update($data);
        event(new PageSetsWasUpdated($pagesets, $data));
        return $pagesets;
    }
}