<?php

namespace Modules\MainPage\Repositories\Eloquent;

use Modules\MainPage\Repositories\MainpageRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\MainPage\Events\MainPageWasUpdated;


class EloquentMainpageRepository extends EloquentBaseRepository implements MainpageRepository
{
    public function update($dish_category, $data)
    {
        //event($event = new MainPageIsUp($dish, $data));
        $dish_category->update($data);

        event(new MainPageWasUpdated($dish_category, $data));

        return $dish_category;
    }
}
