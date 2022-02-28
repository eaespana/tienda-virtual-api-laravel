<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\pedido_articulo;
use App\Models\Pedido;
use App\Models\Cliente;


class PedidoArticuloController extends Controller
{
    public function index(){
        return view('contenidodetallepedido',[
            'pedido_articulo' => pedido_articulo::latest()
                            ->orderByDesc("pedido_id")
                            ->paginate()
        ]);
    }

    public function store(Request $request){

        //Consulta del cliente por usuario id
        $dato_cliente = Cliente::where('user_id', auth()->id())
                                ->first();
        $datos_request = $request->all();
        $fecha_actual = date("d-m-Y");
        $datos_request['pedido']['cliente_id'] = $dato_cliente["id"];
        $datos_request['pedido']['fecha_entrega'] = date("Y-m-d H:m:s",strtotime($fecha_actual."+ 15 days"));

        $pedido = Pedido::create($datos_request['pedido']);

        foreach ($datos_request['detallePedido'] as $key => $value) {
            $datos_request['detallePedido'][$key]['pedido_id'] = $pedido->id;
            $pedido_detalle = pedido_articulo::create($datos_request['detallePedido'][$key]);
        }

        return redirect()->route('pedidos.index')->with('status','Pedido creada');
    }
}
