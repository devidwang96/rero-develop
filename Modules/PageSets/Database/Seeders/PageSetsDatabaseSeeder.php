<?php

namespace Modules\PageSets\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PageSetsDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('pagesets__sets')->delete();
        DB::table('pagesets__sets_translations')->delete();

        DB::table('pagesets__sets')->insert([
            'id' => 1,
            'home_menu_button_show' => 0,
            'home_dishes_categories_show' => 0,
            'home_dishes_menu_show' => 0,
            'home_dishes_show' => 0,
            'home_gallery_show' => 0,
            'home_feedbacks_show' => 0,
            'home_addition_content_show' => 0,
        ]);

        DB::table('pagesets__sets_translations')->insert([
            'id' => 1,
            'sets_id' => 1,
            'locale' => 'en',
            'home_title' => '-',
            'home_meta_keywords' => '-',
            'home_meta_description' => '-',
            'home_add_content_title' => '-',
            'home_add_content' => '-',
            'news_title' => '-',
            'news_meta_keywords' => '-',
            'news_meta_description' => '-',
            'menu_title' => '-',
            'menu_meta_keywords' => '-',
            'menu_meta_description' => '-',
            'events_title' => '-',
            'events_meta_keywords' => '-',
            'events_meta_description' => '-',
            'collective_title' => '-',
            'collective_meta_keywords' => '-',
            'collective_meta_description' => '-',
        ]);

        DB::table('pagesets__sets_translations')->insert([
            'id' => 2,
            'sets_id' => 1,
            'locale' => 'ru',
            'home_title' => '-',
            'home_meta_keywords' => '-',
            'home_meta_description' => '-',
            'home_add_content_title' => '-',
            'home_add_content' => '-',
            'news_title' => '-',
            'news_meta_keywords' => '-',
            'news_meta_description' => '-',
            'menu_title' => '-',
            'menu_meta_keywords' => '-',
            'menu_meta_description' => '-',
            'events_title' => '-',
            'events_meta_keywords' => '-',
            'events_meta_description' => '-',
            'collective_title' => '-',
            'collective_meta_keywords' => '-',
            'collective_meta_description' => '-',
        ]);
    }
}
