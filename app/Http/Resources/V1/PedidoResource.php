<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\ArticuloResource;

class PedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //dd(collect($this->articulo)->toJson());
        return [
            'codigo_pedido' => $this->id,
            'fecha_creacion_pedido' => $this->create_ad,
            'fecha_entrega' => $this->fecha_entrega,
            'ciudad_remision' => $this->ciudad_remision,
            'direccion_remision' => $this->direccion_remision,
            'datos_cliente' => [
                'codigo_cliente' => $this->cliente->id,
                'nombre_cliente' => $this->cliente->nombre_cliente,
                'celular' => $this->cliente->celular
            ],
            'datos_articulos' => ArticuloResource::collection($this->articulo)
            /*'datos_articulos' => [
                'codigo_articulo' => $this->pedidoarticulo->id,
                'cantidad_solicitada' => $this->pedidoarticulo->articulo->cantidad_solicitada,
                'nombre_articulo' => $this->pedidoarticulo->articulo->nombre_articulo,
                'descripcion_articulo' => $this->pedidoarticulo->articulo->descripcion_articulo
            ]*/
        ];
    }
}
