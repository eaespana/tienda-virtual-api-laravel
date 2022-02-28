<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'ciudad_remision',
        'direccion_remision',
        'cliente_id',
        'fecha_entrega',
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function articulo(){
        return $this->belongsToMany(Articulo::class,'pedido_articulos');
    }
}
