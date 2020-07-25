<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=['id'];

    function Product_images(){
            return $this->hasMany(\App\Product_image::class,'product_id');
    }
    function Product_category(){
            return $this->hasOne(\App\Categorie::class,'id','cat_id');
    }
    // protected $table='assign_memberships';
}
