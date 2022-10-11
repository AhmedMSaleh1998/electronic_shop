@extends('layout.layout')
@section('content')
<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span class="text-danger h1">Order Details</span>
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <div class="table-responsive">
                <table class="timetable_sub table table-bordered">
                    <thead class="bg-dark text-center">
                        <tr>
                            <th>SL No.</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>status</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item )
                        <tr class="rem1">
                            <td class="invert">{{ $item->product_id }}</td>
                            <td class="invert">{{ $item->product->name }}</td>
                            <td class="invert-image">
                                <a href="single.html">
                                    <img src="{{asset('images/products/'.$item->product->image) }}" alt="{{ $item->product->name }}image" style="width:65px; height:65px" class="img-responsive">
                                </a>
                            </td>
                            <td class="invert"> {{ $order->status }}</td>
                            <td class="invert"> {{ $item->quantity }}</td>
                            <td class="invert">{{ $item->product->price }}</td>
                            <td class="invert">{{ ($item->product->price)*($item->quantity) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td colspan="5" class="bg-success" style="padding-left:300px">Total</td>
                        <td>
                            {{ $order->total }}
                        </td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
