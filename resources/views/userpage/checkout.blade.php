@extends('master')
@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">Checkout</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->

<section class="checkout_area section_gap">
    <div class="container">
        @if(Session::get('logged')==false || !Session::has('logged'))
        <div class="returning_customer">
            <div class="check_title">
                <h2>Returning Customer? <a href="{{url('login')}}">Click here to login</a></h2>
            </div>
            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
                customer, please proceed to the Billing & Shipping section.</p>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="name" name="name">
                    <span class="placeholder" data-placeholder="Username or Email"></span>
                </div>
                <div class="col-md-6 form-group p_star">
                    <input type="password" class="form-control" id="password" name="password">
                    <span class="placeholder" data-placeholder="Password"></span>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="primary-btn">login</button>
                    <div class="creat_account">
                        <input type="checkbox" id="f-option" name="selector">
                        <label for="f-option">Remember me</label>
                    </div>
                    <a class="lost_pass" href="#">Lost your password?</a>
                </div>
            </form>
        </div>
        @endif

        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first" name="name">
                            <span class="placeholder" data-placeholder="First name"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="last" name="name">
                            <span class="placeholder" data-placeholder="Last name"></span>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="company" name="company" placeholder="Company name">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" name="number">
                            <span class="placeholder" data-placeholder="Phone number"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="email" name="compemailany">
                            <span class="placeholder" data-placeholder="Email Address"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <select class="country_select">
                                <option value="1">Country</option>
                                <option value="2">Country</option>
                                <option value="4">Country</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="add1" name="add1">
                            <span class="placeholder" data-placeholder="Address line 01"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="add2" name="add2">
                            <span class="placeholder" data-placeholder="Address line 02"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="city" name="city">
                            <span class="placeholder" data-placeholder="Town/City"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <select class="country_select">
                                <option value="1">District</option>
                                <option value="2">District</option>
                                <option value="4">District</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector">
                                <label for="f-option2">Create an account?</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <h3>Shipping Details</h3>
                                <input type="checkbox" id="f-option3" name="selector">
                                <label for="f-option3">Ship to a different address?</label>
                            </div>
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#">Product <span>Total</span></a></li>
                            @php
                            $index = 0;
                            foreach($products as $product)
                            echo '<li><a href="#">'.$product->product_name.'<span class="middle">'.$quantity[$index] .'</span> <span class="totalPrd">'.$product->price*$quantity[$index++].'</span></a></li>';

                            @endphp
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span id='totalPrice'></span></a></li>
                        </ul>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <a class="primary-btn" href="#" onclick="order()">Proceed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function order() {
        $.ajax({
            type: 'post',
            url: "{{url('order')}}",
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function() {
                alert('Order Success');
            }
        });
    }
</script>
<!--================End Checkout Area =================-->
@endsection()