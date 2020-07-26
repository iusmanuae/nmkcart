@extends('layouts.layout')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- <div class="breadcrumb-contain">
                    <div>
                        <h2>checkout</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">checkout</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-py-space bg-light">
    <div class="custom-container">
        <div class="checkout-page contact-page">
            <div class="checkout-form">
                <form method="post" action="{{ url("place-order") }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Billing Details</h3></div>
                            <div class="theme-form">
                                <div class="row check-out ">
                                    <input hidden name="products"><input hidden name="quantity">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label>Name</label>
                                        <input type="text" required="" name="name" value="" placeholder="">
                                    </div>
                                   
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="field-label">Phone</label>
                                        <input type="text" required="" name="phone" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="field-label">Email Address</label>
                                        <input type="text" name="email" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="field-label">Country</label>
                                        <input type="text" required="" name="country" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Address</label>
                                        <input type="text" required="" name="address" value="" placeholder="Street address">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Town/City</label>
                                        <input type="text" required="" name="city" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <label class="field-label">State/County</label>
                                        <input type="text" required="" name="state" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <label class="field-label">Postal Code</label>
                                        <input type="text" required="postal-code" name="field-name" value="" placeholder="">
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details theme-form  section-big-mt-space">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    <ul class="qty" id="CartProductData"></ul>
                                    <ul class="sub-total">
                                        <li>Subtotal <span class="count" id="subTotal">Rs 0.00</span></li>
                                        <li>Shipping
                                            <div class="shipping">
                                                <div class="shopping-option">
                                                   
                                                    <label for="free-shipping">Rs 150</label>
                                                </div>
                                                
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="total">
                                        <li>Total <span class="count" id="GrandTotalPrice">0.00</span></li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                               
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" checked="" name="payment-group" id="payment-2">
                                                        <label for="payment-2">Cash On Delivery<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-right"><button type="submit" class="btn-normal btn">Place Order</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection
@section('jquery')
<script type="text/javascript">
    $('.theme-pannel-main').remove();
    $('.color-picker').remove();
    smartCart();
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
    
    var counter_cart=JSON.parse(getCookie('Eshooping_cart'));
    $('#cart-product-counter').html(counter_cart.length)

    function smartCart() {
        $('input[name="products"]').val(getCookie('Eshooping_products'));
        $('input[name="quantity"]').val(getCookie('Eshooping_qty'));
        $('#CartProductData').html('');
        counter_cart=JSON.parse(getCookie('Eshooping_cart'));
        var subTotal=0;
        $(counter_cart).each(function(i, val) {

            $.ajax({
                url: '{{ url("cart-products") }}/'+val.p_id,
                type: 'get',
                dataType: 'json',
            })
            .done(function(resp) {

               var data='<li>'+resp.name+' × '+JSON.parse(getCookie('Eshooping_qty'))[i]+' <span>Rs '+parseInt(resp.price)*parseInt(JSON.parse(getCookie('Eshooping_qty'))[i])+'</span></li>';

                $('#CartProductData').append(data);
                subTotal+=parseInt(resp.price)*parseInt(val.qty);
                $('#subTotal').html('Rs '+subTotal)
                var grandTotal=subTotal+150;
                $('#GrandTotalPrice').html('Rs '+grandTotal);
            })
        });
    }

    function GetDetails(product_id) {
       $.ajax({
           url: '{{ url("cart-products") }}/'+product_id,
           type: 'get',
           dataType: 'json',
       })
       .done(function(resp) {
        console.log(resp);
           return resp;
       })
       .fail(function() {
           console.log("error");
       });
    }

    function checkOut() {
        var qty=[];
        var product=[];
        $('.quantity_box').each(function(i, val) {
            qty.push($(val).val())
        });
        $('.product_id').each(function(i, val) {
            product.push($(val).val())
        });

        setCookie('Eshooping_products',JSON.stringify(product),1);
        setCookie('Eshooping_qty',JSON.stringify(qty),1);
        
    }

    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
</script>
@endsection
