<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Temp;
use App\Models\department;
use Illuminate\Support\Facades\Auth;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {


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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function addToCart($id)
    {
        $user_id= Auth::user()->id;
        $product = product::find($id);
        $ordertemps = Temp::where('user_id', '=', $user_id)->get();
        $priceAfterDiscount = ($product->price)-($product->price * $product->discount);
            if ($ordertemps->contains('product_id', $id)) {
                $ordertemp = Temp::where('product_id', '=', $id)->first();
                $ordertemp->update([
                    'quantity' => $ordertemp->quantity + 1,
                    'price' => $priceAfterDiscount ,
                    'total' => ($priceAfterDiscount) * ($ordertemp->quantity + 1)
                ]);
            } else {
                Temp::create([
                    'product_id' => $id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'quantity' => 1,
                    'price' => $priceAfterDiscount,
                    'total' => $priceAfterDiscount,
                    'user_id' => $user_id
                ]);
            }
        return back()->with('message', '' . $product->name . ' has been added to card successfully');
    }
}
