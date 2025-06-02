@extends('plantillas.navbar', ['hideFooter' => true])

@section('title', 'Mis Pedidos')

@section('content')
    <div class="container mt-5">
        <h1>Mis Pedidos</h1>
        @foreach ($orders as $order)
            <div class="card mb-3">
                <div class="card-header">
                    Pedido #{{ $order->id }} - Estado: {{ ucfirst($order->status) }}
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($order->items as $item)
                            <li>
                                <strong>{{ $item->product->name }}</strong> - Cantidad: {{ $item->quantity }} - Precio: ${{ $item->price }}
                            </li>
                        @endforeach
                    </ul>
                    <p class="mt-3"><strong>Total:</strong> ${{ $order->total_price }}</p>
                </div>
            </div>
            
        @endforeach
    </div>
@endsection
