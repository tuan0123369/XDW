@if($products)
@foreach($products as $product)
<tr>
    <td>
        <div class="media">
            <div class="d-flex">
                <img src="User/img/cart.jpg" alt="">
            </div>
            <div class="media-body">
                <p>{{($product->product_name)}}</p>
            </div>
        </div>
    </td>
    <td>
        <h5 id="pricePrd{{$product->id_product}}">{{$product->price}}</h5>
    </td>
    <td>
        <div class="product_count">
            <input type="number" name="qty" id="sst{{$product->id_product}}" maxlength="12" value="1" title=" Quantity:" class="input-text qty" oninput="total('{{$product->id_product}}')" min="0">
            <!-- <button
                onclick="var result = document.getElementById('sst{{$product->id_product}}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
            <button
                onclick="var result = document.getElementById('sst{{$product->id_product}}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button> -->
        </div>
    </td>
    <td>
        <h5 id="totalPrd{{$product->id_product}}" class="totalPrd">{{$product->price}}</h5>
    </td>
    <td>
        <a href="javascript:;" onclick="delFromCart('{{$product->id_product}}')"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach
@endif
<tr>
    <td>

    </td>
    <td>

    </td>
    @if($products)
    <td>
        <h5>Subtotal</h5>
    </td>
    <td>
        <h5 id="totalPrice"></h5>
    </td>
    @else
    <td>
        <h2>Cart Empty</h2>
    </td>
    @endif
</tr>
<tr class="out_button_area">
    <td>

    </td>
    <td>

    </td>
    <td>

    </td>
    @if($products)
    <td>
        <div class="checkout_btn_inner d-flex align-items-center">
            <a class="gray_btn" href="{{url('category')}}">Continue Shopping</a>
            <a class="primary-btn" href="{{url('checkout')}}" onclick="quantityProduct()">Proceed to checkout</a>
        </div>
    </td>
    @else
    <td>
        <div class="checkout_btn_inner d-flex align-items-center">
            <a class="primary-btn" href="{{url('category')}}">Continue Shopping</a>
        </div>
    </td>
    @endif
</tr>


<script>
    function delFromCart(ID) {
        $.ajax({
            type: 'post',
            url: "{{url('delFromCart')}}" + ID,
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function(data) {
                $("#cartItemList").html(data.html);
                $("#cartItem").html('&ensp;' + data.item);
                var total = 0;
                $('.totalPrd').each(function() {
                    price = $(this).html();
                    total = parseFloat(total) + parseFloat(price);
                    $('#totalPrice').html(total);
                })
            }
        });
    }

    function quantityProduct() {
        $.ajax({
            type: 'post',
            url: "{{url('delQty')}}",
            data: {
                _token: "{{csrf_token()}}"
            },
        });
        $('.input-text').each(function() {
            qty = $(this).val();
            $.ajax({
                type: 'post',
                url: "{{url('quantityProduct')}}" + qty,
                data: {
                    _token: "{{csrf_token()}}"
                }
            });
        })
    }


    function total(ID) {
        $('#totalPrd' + ID).html($('#pricePrd' + ID).html() * $('#sst' + ID).val());
        var total = 0;
        $('.totalPrd').each(function() {
            price = $(this).html();
            total = parseFloat(total) + parseFloat(price);
            $('#totalPrice').html(total);
        })
    };
</script>