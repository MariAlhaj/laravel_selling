<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'date',
        'total',
        'user_id'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class,'orders_products')->withPivot('qun');
    }



     //                 5000          6000        2000       1000        6000
    //$products -> [ [id + qun]+ [id + qun ] +[id + qun ]+[id + qun ]+[id + qun ]]


    public function sum_products($products)
    {
        $total =0;

        foreach ($products as $p ) {



            $qun = $p['qun'];
            $id =  $p['id'];
            $pro = Product::find($id);
            $each =  $qun * $pro->price;
            $total = $total +  $each;
        }

          return $total;
    }

}
