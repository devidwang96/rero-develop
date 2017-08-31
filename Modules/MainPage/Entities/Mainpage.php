<?php

namespace Modules\MainPage\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

use Modules\Media\Support\Traits\MediaRelation;

class Mainpage extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'mainpage__mainpages';
    public $translatedAttributes = [
        'slogan_string',
        'welcome_string',
        'show_menu_string',
        'our_menu_string',
        'our_menu_addition_string',
        'gallery_title',
        'leave_feedback_title',
        'leave_feedback_addition',
        'copyrights',
        'addition_content'
    ];
    protected $fillable = [
        'slogan_string',
        'welcome_string',
        'show_menu_string',
        'our_menu_string',
        'our_menu_addition_string',
        'gallery_title',
        'leave_feedback_title',
        'leave_feedback_addition',
        'copyrights',
        'addition_content',

        'locale',
        'welcome_string',
        'show_menu_string',
        'our_menu_string',
        'our_menu_addition_string',
        'gallery_title',
        'leave_feedback_title',
        'leave_feedback_addition',
        'copyrights',
        'addition_content',
        'menu_button_show',
        'dishes_categories_show',
        'dishes_menu_show',
        'dishes_show',
        'gallery_show',
        'feedbacks_show',
        'addition_content_show'
    ];
}
