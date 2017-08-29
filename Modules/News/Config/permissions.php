<?php

return [
    'news.news' => [
        'index' => 'news::news.list resource',
        'create' => 'news::news.create resource',
        'edit' => 'news::news.edit resource',
        'destroy' => 'news::news.destroy resource',
    ],
    'news.categories' => [
        'index' => 'news::categories.list resource',
        'create' => 'news::categories.create resource',
        'edit' => 'news::categories.edit resource',
        'destroy' => 'news::categories.destroy resource',
    ],
// append


];
