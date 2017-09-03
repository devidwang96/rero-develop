<?php

namespace Modules\MainPage\Repositories\Eloquent;

use Modules\MainPage\Repositories\MainpageRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\MainPage\Events\MainPageWasUpdated;


class EloquentMainpageRepository extends EloquentBaseRepository implements MainpageRepository
{
    public function update($mainpage, $data)
    {
        //event($event = new MainPageIsUp($dish, $data));
        $mainpage->update($data);

        event(new MainPageWasUpdated($mainpage, $data));

        return $mainpage;
    }
}
