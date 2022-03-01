<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\pedido_articulo;

use Illuminate\Http\Request;
use App\Http\Resources\V1\PedidoArticuloResource;

class PedidoArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedido_articulo  $pedido_articulo
     * @return \Illuminate\Http\Response
     */
    public function show(pedido_articulo $pedido_articulo)
    {
        return new PedidoArticuloResource($pedido_articulo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pedido_articulo  $pedido_articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pedido_articulo $pedido_articulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedido_articulo  $pedido_articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(pedido_articulo $pedido_articulo)
    {
        //
    }
}
