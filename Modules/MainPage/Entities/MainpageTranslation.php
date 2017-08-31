<?php

namespace Modules\MainPage\Entities;

use Illuminate\Database\Eloquent\Model;

class MainpageTranslation extends Model
{
    public $timestamps = false;
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
        'addition_content'
    ];
    protected $table = 'mainpage__mainpage_translations';
}
