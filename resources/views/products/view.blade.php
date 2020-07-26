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
                                    <?php $first = true;  ?>
                                    @foreach($products->product_images as $key => $p)
                                    <div class="carousel-item <?= $first ? 'active' : '' ?>">
                                        <img class="img-fluid" src="{{ asset('public/images/layout-1/product') }}/{{ $p->image }}" alt="First slide">
                                    </div>
                                    <?php $first = false; ?>
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
                                            <h6 class="product-title">Quantity</h6>
                                            <div class="qty-box">
                                                <input type="number" name="quantity" class="form-control input-number" value="1"></div>
                                            </div>
                                        </div>
                                        <div class="product-buttons" onclick="addToCart()"><a class="btn btn-outline-success" href='javascript:;'>add to cart</a></div>
                                        <div class="border-product">
                                            <h6 class="product-title">Description</h6>
                                            <p style="height: 100px;overflow-y: hidden;">{{ $products->desc }}</p>
                                        </div>                                        
                                    </div>
                                </div><br>
                         
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
                        <h2>Related Products</h2>
                    </div>
                </div>


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
                                        <button onclick="openCart()" type="button">
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
                                </div>
                                <div class="product-detail">
                                    <div class="detail-title">
                                        <div class="detail-left">
                                            <a href="#">
                                                <h4 class="price-title" style="font-size: 18px!important">
                                                    {{ $p->name }}
                                                </h4>
                                            </a>
                                        </div>
                                        <div class="detail-right">
                                            <div class="price">
                                                <div class="price">
                                                    AED {{ $p->price }}
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
    $(document).ready(function() {
        $('.carousel').carousel();
    });
    var cartData = [];

    function addToCart() {

        checkCookie();
        setTimeout(function() {
            var counter_cart = JSON.parse(getCookie('Eshooping_cart'));
            $('#cart-product-counter').html(counter_cart.length)
        }, 500);
        // console.log(getCookie("Eshooping_cart"))
    }

    function checkCookie() {
        var update_data = false;
        var update_id = '';
        var eshooping_cart = getCookie("Eshooping_cart");
        if (eshooping_cart.length > 0) {
        //     // alert('old')
            eshooping_cart = JSON.parse(eshooping_cart);
            if (eshooping_cart.length <= 0) {
                // alert('add to cart new')
                eshooping_cart.push([{
                    p_id: 
                           <?=  $product_id ?>,
                    qty: $('input[name="quantity"]').val()
                }])
            } else {
                for (var i = 0; i < eshooping_cart.length; i++) {
                    if (parseInt(eshooping_cart[i].p_id) == parseInt(<?=
                                $product_id
                            ?>)) {
                        update_id = i;
                        update_data = true;
                    }
                }
            }
            if (update_data == true) {
                // alert('match')
                eshooping_cart[update_id] = {
                    p_id: 
                            <?= $product_id ?>
                        ,
                    qty: $('input[name="quantity"]').val()
                }
            } else {
        //         // alert('no match');
                eshooping_cart.push({
                    p_id: 
                           <?= $product_id ?>
                        ,
                    qty: $('input[name="quantity"]').val()
                })
            }

            setCookie('Eshooping_cart', JSON.stringify(eshooping_cart), 1);
        } else {
            // alert('new');
            setCookie('Eshooping_cart', JSON.stringify([{
                p_id: 
                        <?= $product_id ?>,
                qty: $('input[name="quantity"]').val()
            }]), 1);
        }
        // console.log(eshooping_cart);
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

 
</script>
@endsection