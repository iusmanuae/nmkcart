@extends('layouts.layout')
@section('content')
<style type="text/css">
    a{
        color: #ff6000;
    }
    .table{
        width: 100%!important;
    }
</style>
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>My Orders</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">orders</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-py-space bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar"><a class="popup-btn">my account</a></div>
                <div class="dashboard-left">
                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                    <div class="block-content ">
                        <ul>
                            <li class="active"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ url('my-order') }}">My Orders</a></li>
                            <li><a href="#">My Profile</a></li>
                            <li><a href="#">Change Password</a></li>
                            <li class="last">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="page-title">
                            <h2>My Orders</h2>
                        </div>
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                              <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">Pending</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1">Active</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">Completed</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu3">Decline</a>
                              </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div class="tab-pane container active" id="home">
                                <table id="pendingOrderTable" class="table">
                                      <thead>
                                          <tr>
                                              <th>Image</th>
                                              <th>Product Name</th>
                                              <th>Price</th>
                                              <th>Qty</th>
                                              <th>Total</th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                </table>
                              </div>
                              <div class="tab-pane container fade" id="menu1">
                                <table class="table" id="ActiveOrderTable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                              </div>
                              <div class="tab-pane container fade" id="menu2">
                                <table class="table" id="CompleteOrderTable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                              </div>
                              <div class="tab-pane container fade" id="menu3">
                                <table class="table" id="DeclineOrderTable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection
@section('jquery')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jq-3.3.1/dt-1.10.21/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/ju/jq-3.3.1/dt-1.10.21/datatables.min.js"></script>
<script>
   
    $('#pendingOrderTable').DataTable({
            "ajax": "{{ url('order') }}/pending",
    });
    $('#ActiveOrderTable').DataTable({
            "ajax": "{{ url('order') }}/active",
    });
    $('#CompleteOrderTable').DataTable({
            "ajax": "{{ url('order') }}/placed",
    });
    $('#DeclineOrderTable').DataTable({
            "ajax": "{{ url('order') }}/canceled",
    });
</script>
@endsection