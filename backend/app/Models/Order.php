<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model  {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    protected $fillable = [
        'name', 'percentage', 'no_of_service',
    ];

}
