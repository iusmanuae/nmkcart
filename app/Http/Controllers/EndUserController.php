<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_detail;

class EndUserController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

	
    public function Index()
    {
    	$x=1;
    	$categories=app('App\Http\Controllers\CategoryController')->AllCategories();
    	return view('end-user/index',compact('x','categories'));
    }
    public function MyOrders()
    {
    	$x=1;
    	$categories=app('App\Http\Controllers\CategoryController')->AllCategories();
    	
    	return view('end-user/my_orders',
    		   compact('x','categories'));
    }
    public function OrderStatus($status)
    {
    	$order=Order::with('Order_details')->where('status',$status)->get();
    	// return $order[0];
    	$resp=[];
    	foreach ($order as $key => $val){
 			foreach ($val->order_details as $key => $val1){
	    		$data=[
	    				'<img style="width:60px" src="http://localhost/blog/public/images/layout-1/product/'.$val1->product_data->product_images[0]->image.'" alt="'.$val1->product_data->product_images[0]->image.'">',
	    				$val1->product_data->name,
	    				'Rs '.$val1->price,
	    				$val1->qty,
	    				'Rs '.$val1->qty*$val1->price,
	    			];
	    		array_push($resp, $data);
    		}
    	}
    	$temp['data']=$resp;
    	return $temp;
    }
}
