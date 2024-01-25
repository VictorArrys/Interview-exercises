<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductControllerClient extends Controller
{


    public function show(){
        $dataProducts = Product::all();
        //return $dataProducts;
        return view('products_view')->with('producto',$dataProducts);
    }

}

