<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

class CategoryController extends Controller
{
    public function AllCategories()
    {
    	$categories=Categorie::all();
        return $categories;
    }
}
