<?php

namespace Modules\Orders\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders__orders';
    protected $fillable = [
        'name',
        'tel',
        'count',
        'status',
        'dish_id'
    ];
}
