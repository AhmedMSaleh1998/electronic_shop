<?php

namespace App\Http\Controllers;
use App\Models\Temp;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function OrderConfirm(){
    $user_id= Auth::user()->id;
    $orders = Temp::where('user_id', '=', $user_id)->get();

    Order::create([
        'status'=> 'pending',
        'user_id' => $user_id,
    ]);
    }
}
