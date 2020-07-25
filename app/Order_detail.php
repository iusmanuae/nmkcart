<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $guarded=['id'];

    protected $table='orders_details';

    function Product_data(){
            return $this->hasOne(\App\Product::class,'id','product_id')->with('Product_images');
    }
}
