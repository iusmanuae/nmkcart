@extends('layouts.layout')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- <div class="breadcrumb-contain">
                    <div>
                        <h2>cart</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">cart</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="cart-section section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">image</th>
                        <th scope="col">product name</th>
                        <th scope="col">price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">action</th>
                        <th scope="col">total</th>
                    </tr>
                    </thead>
                   
                        <tbody id="cart_data_table"></tbody>
                </table>
                <table class="table cart-table table-responsive-md">
                    <tfoot>
                    <tr>
                        <td>total price :</td>
                        <td>
                            <h2 id="subTotal">$6935.00</h2></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12"><a href="#" class="btn btn-normal">continue shopping</a> <a onclick="checkOut()" href="{{ url("user-details") }}" class="btn btn-normal ml-3">check out</a></div>
        </div>
    </div>
</section>
<!--section end-->

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
        $('#cart_data_table').html('');
        counter_cart=JSON.parse(getCookie('Eshooping_cart'));
        var subTotal=0;

        $(counter_cart).each(function(i, val) {

            $.ajax({
                url: '{{ url("cart-products") }}/'+val.p_id,
                type: 'get',
                dataType: 'json',
            })
            .done(function(resp) {

               var data='<tr><td> <a href="#"><img style="max-width:100px" src="{{ asset('/images/layout-1/product') }}/'+resp.product_images[0].image+'" alt="cart" class=""></a></td><td><a href="#">'+resp.name+'</a><div class="mobile-cart-content row"><div class="col-xs-3"><div class="qty-box"><div class="input-group"></div></div></div><div class="col-xs-3"></div><div class="col-xs-3"><h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a></h2></div></div></td><td><h2>Rs '+resp.price+'</h2></td><td><div class="qty-box"><div class="input-group"> <input type="number" name="quantity[]" class="quantity_box form-control input-number" value="'+val.qty+'"><input class="product_id" type="hidden" name="product_id[]" value="'+val.p_id+'"></div></div></td><td><a href="#" class="icon"><i class="ti-close"></i></a></td><td><h2 class="td-color">Rs '+parseInt(val.qty)*parseInt(resp.price)+'</h2></td></tr>';
                $('#cart_data_table').append(data);
                subTotal+=parseInt(resp.price)*parseInt(val.qty);
                $('#subTotal').html('Rs '+subTotal)
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