@extends('layouts/articulospedidos')

@section('contenidoPedido')
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-3 my-10">
            <div class="grid grid-cols-3 my-10">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"># Pedido</th>
                        <th scope="col">Nombre cliente</th>
                        <th scope="col">Nombre articulo</th>
                        <th scope="col">Cantidad solicitada</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($pedido_articulo as $pedidoarticulo)
                        <tr>
                            <th scope="row">{{ $pedidoarticulo->pedido->id }}</th>
                            <td>{{ $pedidoarticulo->pedido->cliente->nombre_cliente }}</td>
                            <td>{{ $pedidoarticulo->articulo->nombre_articulo }}</td>
                            <td>{{ $pedidoarticulo->cantidad_solicitada }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <div class="mb-10">
            {{ $pedido_articulo->links() }}
        </div>
    </div>
@endsection
