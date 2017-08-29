<?php

namespace Modules\Dishes\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Dish extends Model
{
    use Translatable , MediaRelation;

    protected $table = 'dishes__dishes';
    public $translatedAttributes = ['title', 'short_contain', 'full_description', 'status', 'on_main'];
    protected $fillable = ['title', 'short_contain', 'full_description', 'status', 'on_main', 'price', 'category_id'];
}
