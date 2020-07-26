@extends('layouts.layout')
@section('content')
<div class="row text-center">
    <div class="col-md-10 mx-auto">
         <h4>Products By Category</h4>
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
