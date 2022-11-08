<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Department;

class DepartmentController extends Controller
{
    public function index(){
        $department = Department::all();
        return ResponseJson("success" , "products Shown successfully" , $department);
    }

    public function show($id)
    {
        $department = Department::find($id);
        return ResponseJson("success" , "product Shown successfully" , $department);
    }

    public function showproducts($id)
    {
        $department = Department::find($id);
        if($department->products->count()>0){
            return ResponseJson("success" , "product Shown successfully" , $department->products);
        }
        return ResponseJson("success" , "No Products" , );
    }
}
