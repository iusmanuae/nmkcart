<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $guarded=['id'];

    public function products(){
        return $this->hasMany('App\Product', 'cat_id', 'id');
    }
}
