<?php

namespace Modules\News\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

use Modules\Media\Entities\File;
use Modules\Media\Support\Traits\MediaRelation;



class News extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'news__news';

    public $translatedAttributes = ['title', 'full_content', 'teaser'];
    protected $fillable = ['news_id', 'status', 'title', 'teaser', 'full_content', 'category_id'];
}







