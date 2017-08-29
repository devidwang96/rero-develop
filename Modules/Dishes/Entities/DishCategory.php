<?php

namespace Modules\Dishes\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class DishCategory extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'dishes__dishcategories';
    public $translatedAttributes = ['title', 'teaser', 'status', 'on_main'];
    protected $fillable = ['title', 'teaser', 'status', 'on_main'];
}
