<?php

namespace Modules\Feedbacks\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Feedbacks\Repositories\FeedbackRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

use Modules\Feedbacks\Events\FeedbackIsCreating;
use Modules\Feedbacks\Events\FeedbackIsUpdating;
use Modules\Feedbacks\Events\FeedbackWasCreated;
use Modules\Feedbacks\Events\FeedbackWasDeleted;
use Modules\Feedbacks\Events\FeedbackWasUpdated;

class EloquentFeedbackRepository extends EloquentBaseRepository implements FeedbackRepository
{
    public function update($feedback, $data)
    {
        event($event = new FeedbackIsUpdating($feedback, $data));
        $feedback->update($event->getAttributes());

        event(new FeedbackWasUpdated($feedback, $data));

        return $feedback;
    }

    public function create($data)
    {
        event($event = new FeedbackIsCreating($data));
        $feedback = $this->model->create($event->getAttributes());


        event(new FeedbackWasCreated($feedback, $data));

        return $feedback;
    }

    public function destroy($model)
    {
        event(new FeedbackWasDeleted($model->id, get_class($model)));

        return $model->delete();
    }
}
