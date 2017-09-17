<?php

namespace Modules\Pagesets\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Pagesets\Repositories\SetsRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

use Modules\Pagesets\Events\PagesetsWasUpdated;


class EloquentSetsRepository extends EloquentBaseRepository implements SetsRepository
{
    public function update($pagesets, $data)
    {
        $pagesets->update($data);
        event(new PagesetsWasUpdated($pagesets, $data));
        return $pagesets;
    }
}