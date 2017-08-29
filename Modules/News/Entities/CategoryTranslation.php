<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'teaser', 'full_content'];
    protected $table = 'news__category_translations';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
