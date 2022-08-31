<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Product;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index(){
        $department         = Department::orderBy('id','asc')->limit(3)->get();
        $product            = Product::orderBy('created_at','desc')->limit(6)->get();
        return view('index',compact('department'),compact('product'));
    }
    public function departmentProducts(){
        $department = Department::find(1);
        $products = $department->products;
    }
}
