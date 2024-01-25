<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Client;


class SaleController extends Controller
{
    //
    public function saveSale(Request $request)
    {
        $productIds =  (array) $request->input('product_id');
        $amounts = (array) $request->input('amount_products');
        $unitPrices =  (array) $request->input('unit_price');

        $sales_obtained = [];

        for ($i = 0; $i < count($productIds); $i++) {
            $sale_item = [
                'product_id' => $productIds[$i],
                'amount' => $amounts[$i],
                'unit_price' => $unitPrices[$i],
                'total' => $unitPrices[$i] * $amounts[$i],
            ];

            $sales_obtained[] = $sale_item;
        }

        dd($request);
        // Crear el array de ventas estructurado para bd
        $sales_array = [];
        foreach ($sales_obtained as $item_sale) {
            $sale_temp = new Sale();
            $sale_temp->amount_products = $item_sale['amount'];
            $sale_temp->total = $item_sale['total'];
            $sale_temp->client_id = 2;
            $sale_temp->product_id = $item_sale['product_id'];
            $sales_array[] = $sale_temp;
        }
    
        // Guardar las ventas
        foreach ($sales_array as $sale_temp) {
            $sale_temp->save();
        }

        return redirect()->route('post_sale_client')->with('Exito', 'Guardado exitoso de venta con productos');
    }
    

    public function show(){
        //$dataSale = Sale::all();
        //return $dataProducts;
        $dataSale = Sale::with('client')->with('product')->get();
        return view('sales_view')->with('sale',$dataSale);
    }

}
