<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Temp;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TempController extends Controller
{
    public function index(){
        $products = Temp::where('user_id', '=', Auth::user()->id)->get();
        $total=$products->sum('total');
        return view('ordertemp',compact('products','total'));
    }

    public function plus($id){
        $ordertemp = Temp::where('product_id', '=', $id)->first();
                $ordertemp->update([
                    'quantity' => $ordertemp->quantity + 1,
                    'total'    => ($ordertemp->price) * ($ordertemp->quantity+1),
                ]);
                return back()->with('message', ' succes');
    }

    public function minus($id){
        $ordertemp = Temp::where('product_id', '=', $id)->first();
        if($ordertemp->quantity == 1){
            $ordertemp->delete();
        }else{
                $ordertemp->update([
                'quantity' => $ordertemp->quantity - 1,
                'total'    => ($ordertemp->price) * ($ordertemp->quantity-1),
            ]);
            }
        return back()->with('message',  'succes');
    }

    public function delete($id){
        $ordertemp = Temp::where('product_id', '=', $id)->first();
        $ordertemp->delete();
        return back()->with('message',  'succes');
    }

    public function delete_all(){
        $user_id= Auth::user()->id;
        $ordertemps = Temp::where('user_id', '=', $user_id)->delete();
        return back()->with('message','succes');
    }
}
