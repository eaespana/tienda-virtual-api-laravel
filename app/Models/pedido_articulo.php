<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido_articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'articulo_id',
        'cantidad_solicitada',
        'pedido_id',
    ];

    public function articulo(){
        return $this->belongsTo(Articulo::class);
    }

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
