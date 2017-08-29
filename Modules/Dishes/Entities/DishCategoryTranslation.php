<?php

namespace Modules\Dishes\Entities;

use Illuminate\Database\Eloquent\Model;

class DishCategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'teaser', 'status', 'on_main'];
    protected $table = 'dishes__dishcategory_translations';
}
