<?php

namespace Modules\News\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $table = 'news__categories';
    public $translatedAttributes = ['title', 'teaser'];
    protected $fillable = ['title', 'teaser'];

    public function tran()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
}
