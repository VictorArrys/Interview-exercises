<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Product;

class ProductController extends Controller
{
  
    public function saveProducts(Request $request){
        $request->validate([
            'name_product' => 'required|string|min:3|max:70',
            'unitarie_price' => 'required|numeric|min:1|max:10000'
        ]);
    
        $product = new Product();
        $product->name_product =  $request->name_product;
        $product->unitarie_price =  $request->unitarie_price;
        $product->save();
    
        return redirect()->route('post_product')->with('Exito', 'Guardado exitoso de producto');
    }
    
    public function deleteProduct($id){
        // Lógica para eliminar el producto
        try{
            $product = Product::find($id);
            $product->delete();
            
            return redirect()->route('post_product')->with('Exito', 'Producto eliminado exitosamente');
        } catch (QueryException $e) {
            //  Excepción de integridad referencial y redireccionar con un mensaje de error
            return redirect()->route('post_product')->with('Error', 'No se puede eliminar el producto debido a que esta relacionado con una venta');
        }
    }
  
    public function showProducts(){
        //get data from db
        $dataProducts = Product::all();
        //open view with the obtained data
        return view('product_admin_view')->with('producto',$dataProducts);
    }



}

