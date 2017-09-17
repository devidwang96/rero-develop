<?php

namespace Modules\Pagesets\Entities;

use Illuminate\Database\Eloquent\Model;

class SetsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'home_menu_button_show',
        'home_dishes_categories_show',
        'home_dishes_menu_show',
        'home_dishes_show',
        'home_gallery_show',
        'home_feedbacks_show',
        'home_addition_content_show',
        'home_title',
        'home_meta_keywords',
        'home_meta_description',
        'home_add_content_title',
        'home_add_content',
        'news_title',
        'news_meta_keywords',
        'news_meta_description',
        'menu_title',
        'menu_meta_keywords',
        'menu_meta_description',
        'events_title',
        'events_meta_keywords',
        'events_meta_description',
        'collective_title',
        'collective_meta_keywords',
        'collective_meta_description',
        'gallery_title',
        'gallery_meta_keywords',
        'gallery_meta_description',
    ];
    protected $table = 'pagesets__sets_translations';
}