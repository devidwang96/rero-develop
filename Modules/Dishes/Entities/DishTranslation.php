<?php

namespace Modules\Dishes\Entities;

use Illuminate\Database\Eloquent\Model;

class DishTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'short_contain', 'full_description', 'price', 'category_id', 'status', 'on_main'];
    protected $table = 'dishes__dish_translations';
}
