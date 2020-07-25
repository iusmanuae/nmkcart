<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=['id'];

    function Order_details(){
            return $this->hasMany(\App\Order_detail::class,'order_id')->with('Product_data');
    }

     function User_details(){
            return $this->hasMany(\App\User::class,'id','user_id');
    }
}
