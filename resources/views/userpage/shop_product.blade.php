
@if($products != null)
@foreach($products as $prd)
<!-- single product -->
<div class="col-lg-4 col-md-6">
    <div class="single-product">
        <img class="User/img-fluid" src="User/img/product/p1.jpg" alt="">
        <div class="product-details">
            <h6>{{$prd->product_name}}</h6>
            <div class="price">
                <h6>{{$prd->price}}</h6>
                <!-- <h6 class="l-through">$210.00</h6> -->
            </div>
            <div class="prd-bottom">
                <a href="javascript:;" class="social-info" onclick="add2Cart('{{$prd->id_product}}')">
                    <span class="ti-bag"></span>
                    <p class="hover-text">Add to bag</p>
                </a>
                <!-- <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a> -->
                <a href="{{Route('sp-chitiet',$prd->id_product)}}" class="social-info">
                    <span class="lnr lnr-move"></span>
                    <p class="hover-text">view more</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
