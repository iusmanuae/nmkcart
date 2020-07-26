<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Product;
use App\Product_image;
use App\Categorie;
use App\Order;

class AdminController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');

	}
    
   

    public function Index()
    {
    	if (Auth::user()->role!='admin') {
    		return redirect('/');
		}
		$products = Product::all();
		$totalProducts = $products->count();

		$categories = Categorie::all();
		$totalCategories = $categories->count();

		$orders = Order::all();
		$totalOrders = $orders->count();

		$users = User::all();
		$totalUsers = $users->count();

    	return view('admin_portal/index', compact('totalProducts', 'totalCategories', 'totalOrders', 'totalUsers'));
    }

    public function AllUser(Request $request)
    {
    	if (Auth::user()->role!='admin') {
    		return redirect('/');
    	}
    	if ($request->ajax()) {

	    	$users=User::where('role','end_user')->get();
	    	$resp=[];
	    	foreach ($users as $key => $u){
	    		$status='';
	    		if ($u->status=='active') {
	    			$status='checked';
	    		}
		    		$data=[
		    				$u->id,
		    				$u->name,
		    				$u->email,
		    				$u->contact_no,
		    				$u->address,
		    				$u->country,
		    				$u->state,
		    				$u->city,
		    				'<label class="switch">
							  <input onchange="changeStatus(this,'.$u->id.')" type="checkbox" '.$status.'>
							  <span class="slider round"></span>
							</label>',
		    				$u->created_at,
		    			];
		    		array_push($resp, $data);
	    	}
	    	$temp['data']=$resp;
	    	return $temp;
    	}

    	return view('admin_portal/all_users');
    }

    public function ChangeStatus($user_id,$status)
    {
    	if (Auth::user()->role!='admin') {
    		return redirect('/');
    	}
    	$update=User::where('id',$user_id)->update([
    		'status' => $status
    	]);

    	return 200;
    }

    public function AllProducts(Request $request)
    {
    	if (Auth::user()->role!='admin') {
    		return redirect('/');
    	}
    	$temp=[];
    	if ($request->ajax()) {
    		
	    	$product=Product::with('Product_images','Product_category')->get();

	    	$resp=[];
	    	foreach ($product as $key => $p){

	    		$status='';
	    		if ($p->status==1) {
	    			$status='checked';
	    		}
		    		$data=[
		    				$p->id,
		    				isset($p->Product_images[0]) ? '<img style="width:40px" src="/images/layout-1/product/'.$p->Product_images[0]->image.'">' : '',
		    				$p->name,
		    				$p->price,
		    				$p->Product_category ? $p->Product_category->name : '',
		    				'<label class="switch">
							  <input onchange="changeStatus(this,'.$p->id.')" type="checkbox" '.$status.'>
							  <span class="slider round"></span>
							</label>',
		    			];
		    		array_push($resp, $data);
	    	}
	    	$temp['data']=$resp;
	    	return $temp;
    	}
    	return view('admin_portal/products');
    }

    public function ChangeProductStatus($id,$status)
    {
    	if (Auth::user()->role!='admin') {
    		return redirect('/');
    	}
    	$update=Product::where('id',$id)->update([
    		'status' => $status
    	]);

    	return 200;
    }

    public function AddProduct()
    {
    	if (Auth::user()->role!='admin') {
    		return redirect('/');
    	}
    	$cat=Categorie::where('status','1')->get();
    	return view('admin_portal/add_products',compact('cat'));
    }

    public function StoreProduct(Request $request)
    {
    	if (Auth::user()->role!='admin') {
    		return redirect('/');
		}

		$this->validate($request, [
			'p_name' => ['required', 'max:255'],
			'p_price' => ['required'],
			'p_desc' => ['required'],
			'p_category' => ['required']
		]);		

    	$product=Product::create([
    		'name' => $request->p_name,
    		'price' => $request->p_price,
    		'desc' => $request->p_desc,
    		'cat_id' => $request->p_category,
    	]);
    	$file1 = "";
    	$file2 = "";

    	if($request->hasFile('p_file1'))
    	{
    		$file1 = $request->p_file1->getClientOriginalName();
    		$request->p_file1->storeAs('public/upload',$file1);

    		Product_image::create([
    			'product_id' => $product->id,
    			'image' => $file1,
    		]);
    	}

    	if($request->hasFile('p_file2'))
    	{
    		$file2 = $request->p_file2->getClientOriginalName();
    		$request->p_file2->storeAs('public/upload',$file2);

    		Product_image::create([
    			'product_id' => $product->id,
    			'image' => $file2,
    		]);
    	}
		return redirect()->route('admin.products')->withStatus(__('Product successfully created.'));
    	
    }

    public function AllCategory(Request $request)
    {
    	if (Auth::user()->role!='admin') {
    		return redirect('/');
    	}
    	if ($request->ajax()) {
    		
	    	$resp=[];
	    	$temp=[];
	    	$category=Categorie::all();
	    	foreach ($category as $key => $c){
	    		$status='';
	    		if ($c->status=='1') {
	    			$status='checked';
	    		}
		    		$data=[
		    				$c->id,
		    				'<img style="width:40px" src="/images/layout-1/nav-img/'.$c->image.'">',
		    				$c->name,
		    				'<label class="switch">
							  <input onchange="changeStatus(this,'.$c->id.')" type="checkbox" '.$status.'>
							  <span class="slider round"></span>
							</label>',
							$c->created_at,
		    			];
		    		array_push($resp, $data);
	    	}
	    	$temp['data']=$resp;
	    	return $temp;
    	}


    	return view('admin_portal/all_category');
    }

    public function ChangeCategoryStatus($user_id,$status)
    {
    	if (Auth::user()->role!='admin') {
    		return redirect('/');
    	}
    	$update=Categorie::where('id',$user_id)->update([
    		'status' => $status
    	]);

    	return 200;
    }

    public function AllOrders(Request $request)
    {
    	if (Auth::user()->role!='admin') {
    		return redirect('/');
    	}
    	if ($request->ajax()) {
    		
	    	$resp=[];
	    	$temp=[];
	    	$orders=Order::with('Order_details','User_details')->get();

	    	foreach ($orders as $key => $o){
	    		$status_color='';
	    		if ($o->status=='pending') {
	    			$status_color='badge-secondary';
	    		}
	    		if ($o->status=='active') {
	    			$status_color='badge-info';
	    		}
	    		if ($o->status=='placed') {
	    			$status_color='badge-success';
	    		}
	    		if ($o->status=='canceled') {
	    			$status_color='badge-danger';
	    		}
		    		$data=[
		    				$o->id,
		    				count($o->User_details) > 0 ? $o->User_details->name : $o->name,
		    				count($o->User_details) > 0 ? $o->User_details->address : $o->address,
		    				count($o->User_details) > 0 ? $o->User_details->country : $o->country,
		    				count($o->User_details) > 0 ? $o->User_details->state : $o->state,
		    				count($o->User_details) > 0 ? $o->User_details->city : $o->city,
		    				'<div class="badge py-2 '.$status_color.'">'.$o->status.'</div>',
							$o->created_at,
							'<a href="'.url('admin/view-orders/'.$o->id).'" class="btn btn-primary">View</a>'
		    			];
		    		array_push($resp, $data);
	    	}
	    	$temp['data']=$resp;
	    	return $temp;
    	}

    	return view('admin_portal/all_orders');
    }

    public function ViewOrder(Request $request,$id)
    {
    	if (Auth::user()->role!='admin') {
    		return redirect('/');
    	}
    	if ($request->ajax()) {
    		
	    	$order=Order::with('Order_details')
	    				->where('id',$id)->get();

	    	$resp=[];
	    	foreach ($order as $key => $val){
	 			foreach ($val->order_details as $key => $val1){
		    		$data=[
		    				$key,
		    				'<img style="width:60px" src="/images/layout-1/product/'.$val1->product_data->product_images[0]->image.'" alt="'.$val1->product_data->product_images[0]->image.'">',
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


    	return view('admin_portal/view_order',compact('id'));
    }

}
