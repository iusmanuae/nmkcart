@extends('layouts.layout')
@section('content')
<div>
    <!-- body start -->
    <section>
        <!-- section start -->
        <section class="section-big-pt-space bg-light">
            <div class="collection-wrapper">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                  @foreach($products->product_images as $key => $p)  
                                  <div class="carousel-item">
                                    <img class="img-fluid" src="{{ asset('public/images/layout-1/product') }}/{{ $p->image }}" alt="First slide">
                                  </div>
                                  @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="row">
                                <div class="col">
                                    <div class="product-right">
                                        <h2>{{ $products->name }}</h2>
                                        <h3>AED {{ $products->price }}</h3>
                                        
                                        <div class="product-description border-product">
                                            
                                            <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Sheer Straight Kurta</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body"><img src="../assets/public/images/size-chart.jpg" alt="" class="img-fluid "></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <h6 class="product-title">quantity</h6>
                                            <div class="qty-box">
                                                <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                                    <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                                            </div>
                                        </div>
                                        <div class="product-buttons" onclick="addToCart()"><a href="#" data-toggle="modal" data-target="#addtocart" class="btn btn-normal">add to cart</a> <a href="#" class="btn btn-normal">buy now</a></div>
                                        <div class="border-product">
                                            <h6 class="product-title">product details</h6>
                                            <p style="height: 100px;overflow-y: hidden;">{{ $products->desc }}</p>
                                        </div>
                                        <div class="border-product  pb-0">
                                            <div class="product-icon">
                                                <ul class="product-social ">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                                </ul>
                                                <form class="d-inline-block">
                                                    <button class="wishlist-btn"><i class="fa fa-heart"></i><span class="title-font">Add To WishList</span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="col order-up" style="flex-basis: unset!important;">
                                    <div class="row imgae-outside-thumbnail">
                                        <div class="col-12 p-0">
                                            <div class="slider-nav">
                                                @foreach($products->product_images as $key => $p)
                                                    <div>
                                                        <img src="{{ asset('public/images/layout-1/product') }}/{{ $p->image }}" 
                                                        alt="" class="img-fluid  image_zoom_cls-0">
                                                    </div>
                                                @endforeach
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section ends -->

        <!-- product-tab starts -->
        <section class="tab-product tab-exes">
            <div class="custom-container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="creative-card creative-inner">
                            <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">Description</a>
                                    <div class="material-border"></div>
                                </li>
                            </ul>
                            <div class="tab-content nav-material" id="top-tabContent">
                                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                    <p>{{ $products->desc }}</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product-tab ends -->


        <!-- related products -->
        <section class="section-big-py-space  ratio_asos bg-light">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12 product-related">
                        <h2>related products</h2>
                    </div>
                </div>
                {{-- <div class="row ">
                    <div class="col-12 product">
                        <div class="product-slide no-arrow">
                            <div>
                                <div class="product-box">
                                    <div class="product-imgbox">
                                        <div class="product-front">
                                            <img src="../assets/public/images/layout-1/product/1.jpg" class="img-fluid  " alt="product">
                                        </div>
                                        <div class="product-back">
                                            <img src="../assets/public/images/layout-1/product/a1.jpg" class="img-fluid  " alt="product">
                                        </div>
                                    </div>
                                    <div class="product-detail detail-center ">
                                        <div class="detail-title">
                                            <div class="detail-left">
                                                <div class="rating-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="#">
                                                    <h6 class="price-title">
                                                        reader will be distracted.
                                                    </h6>
                                                </a>
                                            </div>
                                            <div class="detail-right">
                                                <div class="check-price">
                                                    $ 56.21
                                                </div>
                                                <div class="price">
                                                    <div class="price">
                                                        $ 24.05
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon-detail">
                                            <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                <i class="ti-bag" ></i>
                                            </button>
                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                <i class="ti-heart" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="ti-search" aria-hidden="true"></i>
                                            </a>
                                            <a href="compare.html" title="Compare">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-box">
                                    <div class="product-imgbox">
                                        <div class="product-front">
                                            <img src="../assets/public/images/layout-1/product/2.jpg" class="img-fluid  " alt="product">
                                        </div>
                                        <div class="product-back">
                                            <img src="../assets/public/images/layout-1/product/a2.jpg" class="img-fluid  " alt="product">
                                        </div>
                                    </div>
                                    <div class="product-detail detail-center ">
                                        <div class="detail-title">
                                            <div class="detail-left">
                                                <div class="rating-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="#">
                                                    <h6 class="price-title">
                                                        reader will be distracted.
                                                    </h6>
                                                </a>
                                            </div>
                                            <div class="detail-right">
                                                <div class="check-price">
                                                    $ 56.21
                                                </div>
                                                <div class="price">
                                                    <div class="price">
                                                        $ 24.05
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon-detail">
                                            <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                <i class="ti-bag" ></i>
                                            </button>
                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                <i class="ti-heart" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="ti-search" aria-hidden="true"></i>
                                            </a>
                                            <a href="compare.html" title="Compare">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-box">
                                    <div class="product-imgbox">
                                        <div class="product-front">
                                            <img src="../assets/public/images/layout-1/product/3.jpg" class="img-fluid  " alt="product">
                                        </div>
                                        <div class="product-back">
                                            <img src="../assets/public/images/layout-1/product/a3.jpg" class="img-fluid  " alt="product">
                                        </div>
                                    </div>
                                    <div class="product-detail detail-center ">
                                        <div class="detail-title">
                                            <div class="detail-left">
                                                <div class="rating-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="#">
                                                    <h6 class="price-title">
                                                        reader will be distracted.
                                                    </h6>
                                                </a>
                                            </div>
                                            <div class="detail-right">
                                                <div class="check-price">
                                                    $ 56.21
                                                </div>
                                                <div class="price">
                                                    <div class="price">
                                                        $ 24.05
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon-detail">
                                            <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                <i class="ti-bag" ></i>
                                            </button>
                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                <i class="ti-heart" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="ti-search" aria-hidden="true"></i>
                                            </a>
                                            <a href="compare.html" title="Compare">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-box">
                                    <div class="product-imgbox">
                                        <div class="product-front">
                                            <img src="../assets/public/images/layout-1/product/4.jpg" class="img-fluid  " alt="product">
                                        </div>
                                        <div class="product-back">
                                            <img src="../assets/public/images/layout-1/product/a4.jpg" class="img-fluid  " alt="product">
                                        </div>
                                    </div>
                                    <div class="product-detail detail-center ">
                                        <div class="detail-title">
                                            <div class="detail-left">
                                                <div class="rating-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="#">
                                                    <h6 class="price-title">
                                                        reader will be distracted.
                                                    </h6>
                                                </a>
                                            </div>
                                            <div class="detail-right">
                                                <div class="check-price">
                                                    $ 56.21
                                                </div>
                                                <div class="price">
                                                    <div class="price">
                                                        $ 24.05
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon-detail">
                                            <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                <i class="ti-bag" ></i>
                                            </button>
                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                <i class="ti-heart" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="ti-search" aria-hidden="true"></i>
                                            </a>
                                            <a href="compare.html" title="Compare">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-box">
                                    <div class="product-imgbox">
                                        <div class="product-front">
                                            <img src="../assets/public/images/layout-1/product/5.jpg" class="img-fluid  " alt="product">
                                        </div>
                                        <div class="product-back">
                                            <img src="../assets/public/images/layout-1/product/a5.jpg" class="img-fluid  " alt="product">
                                        </div>
                                    </div>
                                    <div class="product-detail detail-center ">
                                        <div class="detail-title">
                                            <div class="detail-left">
                                                <div class="rating-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="#">
                                                    <h6 class="price-title">
                                                        reader will be distracted.
                                                    </h6>
                                                </a>
                                            </div>
                                            <div class="detail-right">
                                                <div class="check-price">
                                                    $ 56.21
                                                </div>
                                                <div class="price">
                                                    <div class="price">
                                                        $ 24.05
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon-detail">
                                            <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                <i class="ti-bag" ></i>
                                            </button>
                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                <i class="ti-heart" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="ti-search" aria-hidden="true"></i>
                                            </a>
                                            <a href="compare.html" title="Compare">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-box">
                                    <div class="product-imgbox">
                                        <div class="product-front">
                                            <img src="../assets/public/images/layout-1/product/6.jpg" class="img-fluid  " alt="product">
                                        </div>
                                        <div class="product-back">
                                            <img src="../assets/public/images/layout-1/product/a6.jpg" class="img-fluid  " alt="product">
                                        </div>
                                    </div>
                                    <div class="product-detail detail-center ">
                                        <div class="detail-title">
                                            <div class="detail-left">
                                                <div class="rating-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="#">
                                                    <h6 class="price-title">
                                                        reader will be distracted.
                                                    </h6>
                                                </a>
                                            </div>
                                            <div class="detail-right">
                                                <div class="check-price">
                                                    $ 56.21
                                                </div>
                                                <div class="price">
                                                    <div class="price">
                                                        $ 24.05
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon-detail">
                                            <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                <i class="ti-bag" ></i>
                                            </button>
                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                <i class="ti-heart" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="ti-search" aria-hidden="true"></i>
                                            </a>
                                            <a href="compare.html" title="Compare">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-box">
                                    <div class="product-imgbox">
                                        <div class="product-front">
                                            <img src="../assets/public/images/layout-1/product/7.jpg" class="img-fluid  " alt="product">
                                        </div>
                                        <div class="product-back">
                                            <img src="../assets/public/images/layout-1/product/a7.jpg" class="img-fluid  " alt="product">
                                        </div>
                                    </div>
                                    <div class="product-detail detail-center ">
                                        <div class="detail-title">
                                            <div class="detail-left">
                                                <div class="rating-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="#">
                                                    <h6 class="price-title">
                                                        reader will be distracted.
                                                    </h6>
                                                </a>
                                            </div>
                                            <div class="detail-right">
                                                <div class="check-price">
                                                    $ 56.21
                                                </div>
                                                <div class="price">
                                                    <div class="price">
                                                        $ 24.05
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon-detail">
                                            <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                <i class="ti-bag" ></i>
                                            </button>
                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                <i class="ti-heart" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                <i class="ti-search" aria-hidden="true"></i>
                                            </a>
                                            <a href="compare.html" title="Compare">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </section>
        <section class="section-big-pb-space ratio_40 pb-10">            
            <div class="custom-container product">
            
                <div class="row">

                        @foreach($related_products as $key => $p)
                            <div class="col-sm-3 pb-3">
                                <a href="{{ url('view-products') }}/{{ $p->id }}">
                                    <div class="product-box">
                                        <div class="product-imgbox">
                                            <div class="product-front">
                                                <img src="{{ asset('public/images/layout-1/product') }}/{{ $p->product_images[0]->image }}" class="img-fluid  " alt="product">
                                            </div>
                                            <div class="product-back">
                                                <img src="{{ asset('public/images/layout-1/product') }}/{{ $p->product_images[1]->image }}" class="img-fluid  " alt="product">
                                            </div>
                                            <div class="product-icon">
                                                <button  onclick="openCart()" type="button" >
                                                    <i class="ti-bag"></i>
                                                </button>
                                                <a href="javascript:void(0)" title="Add to Wishlist">
                                                    <i class="ti-heart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                    <i class="ti-search" aria-hidden="true"></i>
                                                </a>
                                                <a href="compare.html" title="Compare">
                                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="new-label">
                                                <div>new</div>
                                            </div>
                                            {{-- <div class="on-sale">
                                                on sale
                                            </div> --}}
                                        </div>
                                        <div class="product-detail">
                                            <div class="detail-title">
                                                <div class="detail-left">
                                                    <div class="rating-star">
                                                       {{--  <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i> --}}
                                                    </div>
                                                    <a href="#">
                                                        <h4 class="price-title" style="font-size: 18px!important">
                                                            {{ $p->name }}
                                                        </h4>
                                                    </a>
                                                </div>
                                                <div class="detail-right">
                                                    <div class="check-price">
                                                        {{-- {{ $p->price }} --}}
                                                    </div>
                                                    <div class="price">
                                                        <div class="price">
                                                           Rs {{ $p->price }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </section>
        <!-- related products -->
    </section>
    <!-- body end -->
</div>
@endsection
@section('jquery')
<script>
     $(document).ready(function(){
         $('.carousel').carousel();
     });
    var cartData = [];
    function addToCart() {
        
        checkCookie();
        setTimeout(function() {
            var counter_cart=JSON.parse(getCookie('Eshooping_cart'));
            $('#cart-product-counter').html(counter_cart.length)
        },500);
        // console.log(getCookie("Eshooping_cart"))
    }

    function checkCookie() {
      var update_data= false;
      var update_id= '';
      var eshooping_cart = getCookie("Eshooping_cart");
      if (eshooping_cart.length > 0) {
            // alert('old')
            eshooping_cart= JSON.parse(eshooping_cart);
            if (eshooping_cart.length <= 0) {
                // alert('add to cart new')
                eshooping_cart.push([{ p_id: {{ $product_id }}, qty: $('input[name="quantity"]').val()}])
            }else{
                for (var i = 0; i < eshooping_cart.length; i++) {

                    if ( parseInt(eshooping_cart[i].p_id)== parseInt({{ $product_id }}) ) {

                        update_id=i;
                        update_data=true;
                    }
                }
            }
            if (update_data==true) {
                // alert('match')
                eshooping_cart[update_id]={p_id: {{ $product_id }}, qty: $('input[name="quantity"]').val()}
            }else{
                // alert('no match');
                eshooping_cart.push({ p_id: {{ $product_id }}, qty: $('input[name="quantity"]').val() })
            }
            
           setCookie('Eshooping_cart',JSON.stringify(eshooping_cart),1); 
      }else{
        alert('new');
        setCookie('Eshooping_cart',JSON.stringify([{ p_id: {{ $product_id }}, qty: $('input[name="quantity"]').val()}]),1);
      }
      console.log(eshooping_cart);
    } 

    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }
</script>
@endsection