<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class PedidoArticuloResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $arreglo_pedido = null;
        $datos_articulos = null;
        foreach ($this->resource as $key => $value) {

            if(empty($arreglo_pedido[$value->pedido->id])){
                $arreglo_pedido[$value->pedido->id] = [
                    'codigo_pedido' => $value->pedido->id,
                    'fecha_creacion_pedido' => $value->pedido->create_ad,
                    'fecha_entrega' => $value->pedido->fecha_entrega,
                    'ciudad_remision' => $value->pedido->ciudad_remision,
                    'direccion_remision' => $value->pedido->direccion_remision,
                    'datos_cliente' => [
                        'codigo_cliente' => $value->pedido->cliente->id,
                        'nombre_cliente' => $value->pedido->cliente->nombre_cliente,
                        'celular' => $value->pedido->cliente->celular
                    ]
                ];
            }
            $datos_articulos = [
                'codigo_articulo' => $value->articulo->id,
                'cantidad_solicitada' => $value->cantidad_solicitada,
                'nombre_articulo' => $value->articulo->nombre_articulo,
                'descripcion_articulo' => $value->articulo->descripcion_articulo
            ];

            $arreglo_pedido[$value->pedido->id]['datos_articulos'][$value->articulo->id] = $datos_articulos;

            $datos_articulos = null;
        }
        return $arreglo_pedido;
    }
}
