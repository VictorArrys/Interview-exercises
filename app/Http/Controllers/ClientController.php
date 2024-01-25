<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Database\QueryException;

class ClientController extends Controller
{
    
    public function saveClient(Request $request){
        $request->validate([
            'name_client' => 'required|string|min:5|max:70'
        ]);
    
        $client = new Client();
        $client->name_client =  $request->name_client;
        $client->save();
    
        return redirect()->route('post_client')->with('Exito', 'Guardado exitoso de cliente');
    }
    
    public function deleteClient($id){
        // Lógica para eliminar el cliente
        try{
            $client = Client::find($id);
            $client->delete();
            
            return redirect()->route('post_client')->with('Exito', 'Cliente eliminado exitosamente');
        } catch (QueryException $e) {
            //  Excepción de integridad referencial y redireccionar con un mensaje de error
            return redirect()->route('post_client')->with('Error', 'No se puede eliminar el cliente debido a que esta relacionado con una venta');
        }
    }

    public function showClients(){
        $dataClients = Client::all();
        //return $dataProducts;
        return view('clients_view')->with('clients',$dataClients);
    }
}
