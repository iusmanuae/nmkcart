<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/app_products', 'HomeController@AllProducts');
Route::get('admin', function () {
    return redirect('admin/dashboard');
});
// Route::get('/products', 'ProductController@GetAllProducts');
Route::get('products/{cat_id?}', 'ProductController@AllProducts');
Route::get('view-products/{product_id}', 'ProductController@ViewProduct');
Route::get('cart-products/{product_id}', 'ProductController@CartProducts');
Route::get('cart', 'ProductController@Cart');
Route::get('user-details', 'ProductController@UserDetails');
Route::post('place-order', 'ProductController@PlaceOrder');
Route::get('order-success', 'ProductController@OrderSuccess');
// ====================== END USERE ======================
Route::get('dashboard', 'EndUserController@Index');
Route::get('my-order', 'EndUserController@MyOrders');
Route::get('order/{status}', 'EndUserController@OrderStatus');
// ====================== ADMIN PROTAL ======================
Route::get('admin/dashboard', 'AdminController@Index');
Route::get('admin/users', 'AdminController@AllUser');
Route::post('admin/change-status/{user_id}/{status}', 'AdminController@ChangeStatus');
Route::get('admin/products', 'AdminController@AllProducts')->name('admin.products');
Route::post('admin/change-product-status/{user_id}/{status}', 'AdminController@ChangeProductStatus');
Route::get('admin/add-products', 'AdminController@AddProduct');
Route::post('admin/store-products', 'AdminController@StoreProduct');
Route::get('admin/categories', 'AdminController@AllCategory');
Route::post('admin/change-category-status/{user_id}/{status}', 'AdminController@ChangeCategoryStatus');
Route::get('admin/orders', 'AdminController@AllOrders');
Route::get('admin/view-orders/{id}', 'AdminController@ViewOrder');