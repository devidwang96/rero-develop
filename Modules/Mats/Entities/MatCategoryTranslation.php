<?php

namespace Modules\Mats\Entities;

use Illuminate\Database\Eloquent\Model;

class MatCategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'teaser', 'status', 'mat_category_id'];
    protected $table = 'mats__matcategory_translations';
}
