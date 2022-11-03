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
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-center">Order No.</th>
                            <th class="text-center" >Number Of Items</th>
                            <th class="text-center">total</th>
                            <th class="text-center">Created at</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($orders as $order )
                        <tr class="rem1">
                            <td class="btn btn-success"><a href="{{ route('order.items',$order->id) }}">{{ $order->id }}</a></td>
                            <td>{{ $order->orderItems->count()}}</td>
                            <td class="">{{ ($order->total) }}</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- //checkout page -->
@endsection
