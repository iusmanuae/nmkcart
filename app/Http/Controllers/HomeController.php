<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Product;
use App\Product_image;
use App\Categorie;
use App\Order;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    
    public function index()
    {
        $x=0;
        // $categories=app('App\Http\Controllers\CategoryController')->AllCategories();
        $categories = Categorie::withCount('products')->get();

        $products=app('App\Http\Controllers\ProductController')->GetAllProducts();
        return view('index_1',compact('x','categories','products'));
    }
    public function AllProducts(Request $request)
    {
        
        $temp=[];
            
            $product=Product::with('Product_images','Product_category')->get();

            $resp=[];
            foreach ($product as $key => $p){

                $status='';
                if ($p->status==1) {
                    $status='checked';
                }
                    $data=[
                            $p->id,
                            '<img style="width:40px" src="http://localhost/blog/public/images/layout-1/product/'.$p->Product_images[0]->image.'">',
                            $p->name,
                            $p->price,
                            $p->Product_category ? $p->Product_category->name : '',
                        ];
                    array_push($resp, $data);
            }
            $temp['data']=$resp;
            return $temp;
    }
}
