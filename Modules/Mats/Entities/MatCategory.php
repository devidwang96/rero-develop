<?php

namespace Modules\Mats\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class MatCategory extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'mats__matcategories';
    public $translatedAttributes = ['title', 'teaser'];
    protected $fillable = ['title', 'teaser', 'status', 'mat_category_id'];
}
