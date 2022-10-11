@extends('layout.layout')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @foreach ($products as $prod)
            <!-- shop -->
            <div class="col-md-3 col-xs-5">
                <div class="product">
                    <div class="product-img">
                        <img src="{{ URL::asset("images/products/{$prod->image}") }}" alt="" width="280" height="255">
                        <div class="product-label">
                            <span class="sale">-25%</span>
                            <span class="new">NEW</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">{{ $prod->department->name }}</p>
                        <h3 class="product-name"><a href="#">{{ $prod->name }}</a></h3>
                        <h4 class="product-price">{{ ($prod->price)*0.75 }}<del class="product-old-price">{{ $prod->price }}</del></h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-btns">
                            <p class="btn-holder"><a href="{{  route('cart.store',$prod->id) }}" class="btn btn-danger btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                 </div>
                 <br>
            </div>
            <!-- /shop -->
            @endforeach
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
