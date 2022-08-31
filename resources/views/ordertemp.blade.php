@extends('layout.layout')
@section('content')
<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>art
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <div class="table-responsive">
                <table class="timetable_sub table table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th style="padding-left:80px">Quantity</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $prods )
                        <tr class="rem1">
                            <td class="invert">{{ $prods->product_id }}</td>
                            <td class="invert-image">
                                <a href="single.html">
                                    <img src="images/products/{{ $prods->image }}" alt="{{ $prods->name }}image" style="width:65px; height:65px" class="img-responsive">
                                </a>
                            </td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <a class="btn btn-success btn-md" style="margin-left:55px" href="{{  route('ordertemp-plus',$prods->product_id) }}" />+</a>
                                            <span style="margin:10px">{{ $prods->quantity }}</span>
                                        <a class="btn btn-success btn-md" href="{{  route('ordertemp-minus',$prods->product_id) }}"/>-</a>
                                    </div>
                                </div>
                            </td>
                            <td class="invert" >{{ $prods->name }}</td>
                            <td class="invert">{{ $prods->price }}</td>
                            <td class="invert">{{ $prods->total }}</td>
                            <td class="invert">
                                <div class="rem">
                                    <a class="btn btn-danger" href="{{  route('ordertemp-delete',$prods->product_id) }}"/><span class="glyphicon glyphicon-trash"></span></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td colspan="5" class="bg-success" style="padding-left:300px">Total</td>
                        <td>
                            {{ $total }}
                        </td>
                        <td>
                            <a href="{{ route('ordertemp-delete-all') }}" class="btn btn-danger">Empty Cart</a>
                        </td>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="checkout-left">
            <a href="{{ route('OrderConfirm') }}" class="btn btn-primary btn-lg" style="width:500px; margin-left:190px"/>Confirm Order</a>
        </br>
    </br>
        </div>
    </div>
</div>
<!-- //checkout page -->
@endsection
