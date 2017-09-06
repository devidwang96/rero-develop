<?php

namespace Modules\Mats\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Mat extends Model
{
    use Translatable , MediaRelation;

    protected $table = 'mats__mats';
    public $translatedAttributes = ['title', 'teaser', 'full_description'];
    protected $fillable = ['title', 'teaser', 'full_description', 'status', 'mat_type', 'category_id'];
}
