<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    protected $fillable =[
        'product_id',
        'order_id',
        'qun',

    ];


    public function products()
    {
      return $this->hasMany(Product::class);
    }

    public function orders()
    {
      return $this->hasMany(Order::class);
    }
}
