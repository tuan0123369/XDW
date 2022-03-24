@extends('master')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shop Category page</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ url('index') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ url('category') }}">Shop<span></span></a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Browse Categories</div>
                <ul class="main-categories">
                    @if($categories != null)
                    @foreach($categories as $cate)
                    <li class="main-nav-list">
                        <a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable" onclick="showProduct('{{$cate->id_categories}}')">
                            <span class="lnr lnr-arrow-right"></span>{{$cate->category_name}}
                            <span class="number">(53)</span>
                        </a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="sidebar-filter mt-50">
                <!-- <div class="top-filter-head">Product Filters</div>
                <div class="common-filter">
                    <div class="head">Brands</div>
                    <form action="#">
                        <ul>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
                        </ul>
                    </form>
                </div>
                <div class="common-filter">
                    <div class="head">Color</div>
                    <form action="#">
                        <ul>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
                                    Leather<span>(29)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
                                    with red<span>(19)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
                            <li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
                        </ul>
                    </form>
                </div> -->
                <div class="common-filter">
                    <div class="head">Price</div>
                    <div class="price-range-area">
                        <div id="price-range"></div>
                        <div class="value-wrapper d-flex">
                            <div class="price">Price:</div>
                            <span>$</span>
                            <div id="lower-value"></div>
                            <div class="to">to</div>
                            <span>$</span>
                            <div id="upper-value"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row" id="productList">
                    @include('userpage.shop_product');
                </div>
            </section>
            <!-- End Best Seller -->
            <!-- Start Filter Bar -->

            <!-- start pagination -->
            {{$products->links('userpage.user_pagination')}}
            <!-- end pagination -->

            <!-- End Filter Bar -->
        </div>
    </div>
</div>

<script>
    function add2Cart(ID) {
        $.ajax({
            type: 'POST',
            url: "{{url('add2Cart')}}" + ID,
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                $('#cartItem').html('&ensp;' + data.item);
            }
        });
    }

    function showProduct(id_categorie) {
        $.ajax({
            type: 'get',
            url: "{{url('showProduct')}}" + id_categorie,
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                $('#productList').html(data.html);
            }
        });
    }
</script>

@endsection()