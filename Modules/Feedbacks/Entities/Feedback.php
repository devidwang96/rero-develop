<?php

namespace Modules\Feedbacks\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Feedback extends Model
{
    use MediaRelation;
    protected $table = 'feedbacks__feedback';
    protected $fillable = [
        'name',
        'email',
        'message',
        'status',
    ];
}
