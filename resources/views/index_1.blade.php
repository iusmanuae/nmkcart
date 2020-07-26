@extends('layouts.layout')
@section('content')
<!-- Jumbotron Header -->
<header class=" my-4">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Categories</div>
                <ul class="list-group">
                    @foreach($categories as $key => $c)
                    @if($c->products_count > 0)                
                    <li class="list-group-item"><a href="{{ url('products') }}/{{ $c->id }}" style="color: #000;">{{ $c->name }}</a></li>
                    @else
                        <li class="list-group-item">{{ $c->name }}</li>
                    @endif
                    @endforeach
                </ul>
            </div>                
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-12">
                    <img class="img-fluid" src="{{ asset('public/images/main-banner.jpg') }}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <img class="img-fluid" src="{{ asset('public/images/small-banner1.jpg') }}" alt="">
                </div>
                <div class="col-md-4 col-xs-12">
                    <img class="img-fluid" src="{{ asset('public/images/small-banner2.jpg') }}" alt="">
                </div>
                <div class="col-md-4 col-xs-12">
                    <img class="img-fluid" src="{{ asset('public/images/small-banner3.jpg') }}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <img class="img-fluid" src="{{ asset('public/images/small-banner1.jpg') }}" alt="">
                </div>
                <div class="col-md-4 col-xs-12">
                    <img class="img-fluid" src="{{ asset('public/images/small-banner2.jpg') }}" alt="">
                </div>
                <div class="col-md-4 col-xs-12">
                    <img class="img-fluid" src="{{ asset('public/images/small-banner3.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

</header>
<div class="row text-center">
    <div class="col-md-10 mx-auto">
         <h4>Top Rated Products</h4>
    </div>
</div>
<div class="row text-center">
    @if( count($products) <= 0 )
        <h2 class="text-center">Sorry No Product Found<br>:(</h2>
    @endif
    @foreach($products as $key => $p)
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
            <?php if(isset($p->product_images[0])) : ?>
          <img class="card-img-top" src="{{ asset('public/images/layout-1/product') }}/{{ $p->product_images[0]->image }}" alt="">
          <?php endif ?>
          <div class="card-body">
            <h4 class="card-title">{{ $p->name }}</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
          <div class="card-footer">
            <a href="{{ url('view-products') }}/{{ $p->id }}" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>
    @endforeach
</div>
@endsection
