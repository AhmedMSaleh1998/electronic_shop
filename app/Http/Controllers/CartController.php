<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Auth::user()->cart;
        return view('cartDetails',compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {

        $product = Product::where('id', $id)->first();
        if(Auth::user()->cart){
            $item = Auth::user()->cart->cartItems->where('product_id', $id)->first();
            $cart = Auth::user()->cart;
            if($item){
                $item->update([
                'quantity' => $item->quantity +1,
                'total'    => ($product->price * $item->quantity),
                ]);
                $cart->update([
                    'total'=>$cart->total + $item->total
                ]);
            }else{
             CartItem::create([
                'product_id' => $id ,
                'quantity' => 1,
                'total' => $product->price ,
                'cart_id'=> Auth::user()->cart->id,
            ]);
            $cart->update([
                'total'=>$cart->total + $product->price
            ]);
        }
        }else{
            $cart = Cart::create([
                'user_id' => Auth::user()->id,
                'total'   => 0,
            ]);
            $item = CartItem::create([
                'product_id' => $id ,
                'quantity' => 1,
                'total' => $product->price ,
                'cart_id'=> $cart->id,
            ]);
            $cart->update([
                'total'=>$cart->total + $item->total
            ]);
        }
        return back()->with('message',  'succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $cart = Auth::user()->cart;
        foreach(Auth::user()->cart->cartItems as $item){
        $item->delete();
        }
        $cart->update([
            'total'=> 0,
        ]);
        return back()->with('message', ' succes');
    }

    public function plus($id){
        $cart = Auth::user()->cart;
        $item = Auth::user()->cart->cartItems->where('product_id', $id)->first();
        $product = Product::where('id', $id)->first();

        $item->update([
            'quantity' => $item->quantity +1,
            'total'    => ($item->total)+($product->price)
        ]);
        $cart->update([
            'total'=>$cart->total + $product->price
        ]);
        return back()->with('message', ' succes');
    }

    public function minus($id){
        $item = Auth::user()->cart->cartItems->where('product_id', $id)->first();
        $product = Product::where('id', $id)->first();
        $cart = Auth::user()->cart;
        if(($item->quantity) > 1){
        $item->update([
            'quantity' => $item->quantity  - 1,
        ]);
        $cart->update([
            'total'=>$cart->total - $product->price
        ]);
        }else{
        $item->delete();
        $cart->update([
            'total'=>$cart->total - $item->total
        ]);
        }
        return back()->with('message', ' succes');
    }

    public function deleteItem( $id)
    {
        $item = Auth::user()->cart->cartItems->where('product_id', $id)->first();
        $cart = Auth::user()->cart;
        $item->delete();
        return back()->with('message', ' succes');
        $cart->update([
            'total'=>$cart->total - $item->total
        ]);
    }
}
