<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Product;


class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return ResponseJson("success" , "products Shown successfully" , $product);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return ResponseJson("success" , "product Shown successfully" , $product);
    }
}
