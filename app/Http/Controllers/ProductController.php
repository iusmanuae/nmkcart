<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Product;
use App\Order;
use App\Order_detail;

class ProductController extends Controller
{
    public function GetAllProducts()
    {
    	$products=Product::with('Product_images')->where('status','1')->get();
    	return $products;
    }
    public function AllProducts($cat_id='')
    {
    	$x=1;
    	$categories=app('App\Http\Controllers\CategoryController')->AllCategories();
    	$products=Product::with('Product_images');
    	if ($cat_id!='') {
    		$products=$products->where('cat_id',$cat_id);
    	}
    	$products=$products->where('status','1')->get();
    	return view('products/index',compact('x','categories','products'));
    }
    public function ViewProduct($product_id)
    {
    	$x=1;
    	$categories=app('App\Http\Controllers\CategoryController')->AllCategories();
    	$products=Product::with('Product_images')
    					   ->where('status','1')
    					   ->where('id',$product_id)->first();
    	$related_products=Product::with('Product_images')
    							->where('status','1')
                                ->where('cat_id',$products->cat_id)
                                ->limit(8)
                                ->get();
                                // ->random();
    	return view('products/view',compact('x','categories','products','related_products','product_id'));
    }
    public function CartProducts($product_id)
    {
    	$products=Product::with('Product_images')
    					   ->where('status','1')
    					   ->where('id',$product_id)->first();
    	return $products;
    }
    public function Cart()
    {
    	$x=1;
    	$categories=app('App\Http\Controllers\CategoryController')->AllCategories();
    	return view('cart/index',compact('x','categories'));
    }
    public function UserDetails()
    {
        $x=1;
        $categories=app('App\Http\Controllers\CategoryController')->AllCategories();
        return view('user_details/index',compact('x','categories'));
    }
    public function PlaceOrder(Request $request)
    {
        DB::beginTransaction();
        $order=Order::create([
            'user_id' => !is_null(Auth::user()) ? Auth::user()->id : null,
            'status' => 'pending',
            'phone' => $request->phone,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'email' => $request->email,
            'name' => $request->name,
        ]);

       foreach (json_decode($request->products) as $key => $product_id) {

           $order_details=Order_detail::create([
               'order_id' => $order->id,
               'product_id' => $product_id,
               'qty' => json_decode($request->quantity)[$key],
               'price' =>$this->ViewSingleProduct($product_id)->price,
           ]);
       }
       DB::commit();
       $x=1;
       $categories=app('App\Http\Controllers\CategoryController')->AllCategories();
       return view('thanks/index',compact('x','categories','order'));
    }

    public function ViewSingleProduct($product_id)
    {
        $products=Product::with('Product_images')
                           ->where('status','1')
                           ->where('id',$product_id)->first();
     
        return $products;  
    }

    public function OrderSuccess()
    {
        $x=1;
        $categories=app('App\Http\Controllers\CategoryController')->AllCategories();
        return view('thanks/index',compact('x','categories'));
    }
}
