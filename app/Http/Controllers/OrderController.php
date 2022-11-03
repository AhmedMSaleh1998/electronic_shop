<?php

namespace App\Http\Controllers;
use App\Models\Temp;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\OrderItem;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Auth::user()->orders;
        return view('MyOrders',compact('orders'));
    }

    public function ConfirmOrder(){
    $cart = Auth::user()->Cart;
    $order = Order::create([
        'status'  =>   'pending',
        'user_id' =>   Auth::user()->id ,
        'total'   =>   $cart->total,
    ]);
    foreach($cart->cartItems as $item){
        OrderItem::create([
            'product_id' =>$item->product_id,
            'order_id'   =>$order->id,
            'total'      =>$item->total,
            'quantity'   =>$item->quantity
        ]);
        $item->delete();
        $cart->update([
            'total' => 0,
        ]);
    }
    return view('orderDetails',compact('order'));

}

    public function OrderItems($id){
        $order = order::find($id);
        return view('orderDetails',compact('order'));
    }
}
