<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticuloResource extends JsonResource
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
            'codigo_articulo' => $this->id,
            'nombre_articulo' => $this->nombre_articulo,
            'descripcion_articulo' => $this->descripcion_articulo,
            'cantidad_existencia' => $this->cantidad_existencia,
            'datos_catalogo' => [
                'codigo_catalogo' => $this->catalogo->id,
                'nombre_catalogo' => $this->catalogo->nombre_catalogo,
                'descripcion_articulo' => $this->catalogo->descripcion_catalogo
            ]
        ];
    }
}
