<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            'codigo_pedido' => $this->pedido->id,
            'fecha_creacion_pedido' => $this->pedido->create_ad,
            'fecha_entrega' => $this->pedido->fecha_entrega,
            'ciudad_remision' => $this->pedido->ciudad_remision,
            'direccion_remision' => $this->pedido->direccion_remision,
            'datos_cliente' => [
                'codigo_cliente' => $this->pedido->cliente->id,
                'nombre_cliente' => $this->pedido->cliente->nombre_cliente,
                'celular' => $this->pedido->cliente->celular
            ],
            'datos_articulos' => [
                'codigo_articulo' => $this->articulo->id,
                'cantidad_solicitada' => $this->articulo->cantidad_solicitada,
                'nombre_articulo' => $this->articulo->nombre_articulo,
                'descripcion_articulo' => $this->articulo->descripcion_articulo
            ]
        ];
    }
}
