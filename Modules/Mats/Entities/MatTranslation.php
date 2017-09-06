<?php

namespace Modules\Mats\Entities;

use Illuminate\Database\Eloquent\Model;

class MatTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'teaser', 'full_description', 'category_id', 'status', 'mat_type'];
    protected $table = 'mats__mat_translations';
}
