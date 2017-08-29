<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{

    protected $table = 'news__news_translations';


    public $timestamps = false;
    protected $fillable = ['title', 'teaser', 'full_content'];


    public function getContentAttribute($content)
    {
        event($event = new PostContentIsRendering($content));

        return $event->getContent();
    }

}
