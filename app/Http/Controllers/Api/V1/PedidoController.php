<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PedidoResource;
use App\Http\Resources\V1\PedidoArticuloResource;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\pedido_articulo;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="API Pedidos", version="1.0")
 * @OA\Server(url="http://swagger.local")
 *
 */
class PedidoController extends Controller
{
    /**
    * @OA\Get(
    *     path="api/v1/pedido/",
    *     summary="Mostrar pedidos",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los pedidos."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function index()
    {
        return new PedidoArticuloResource(pedido_articulo::all()
                                            ->sortDesc());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha_actual = date("d-m-Y");
        $header = explode(" ",$request->header('Authorization'));
        $user_id = explode("|", $header[1])[0];

        //Consulta del cliente por usuario id
        $dato_cliente = Cliente::where('user_id', $user_id)
                                ->first();

        $datos_solicitud = $request->toArray();

        $datos_solicitud['pedido']['cliente_id'] = $dato_cliente["id"];
        $datos_solicitud['pedido']['fecha_entrega'] = date("Y-m-d H:m:s",strtotime($fecha_actual."+ 15 days"));

        $pedido = Pedido::create($datos_solicitud['pedido']);

        foreach ($datos_solicitud['detallePedido'] as $key => $value) {
            $datos_solicitud['detallePedido'][$key]['pedido_id'] = $pedido->id;
            $pedido_detalle = pedido_articulo::create($datos_solicitud['detallePedido'][$key]);
        }

        return $request;

    }

    /**
    * @OA\Get(
    *     path="api/v1/pedido/{id}",
    *     summary="Mostrar pedido",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar pedido por id."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function show(Pedido $pedido)
    {
        return new PedidoResource($pedido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
