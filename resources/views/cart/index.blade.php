@extends('plantillas.navbar', ['hideFooter' => true])

@section('title', 'Carrito de Compras')

@section('content')
<div class="container mt-5">
    <h1>Carrito de Compras</h1>
    @if(session('cart'))
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $details)
                    <tr>
                        <td>
                            <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" width="50" height="50"
                                class="img-fluid">
                            {{ $details['name'] }}
                        </td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ $details['price'] }}</td>
                        <td>${{ $details['price'] * $details['quantity'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                            </form>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <h3>Total: ${{ array_reduce(session('cart'), function ($carry, $item) {
            return $carry + $item['price'] * $item['quantity'];
        }, 0) }}</h3>
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Proceder al Pago</button>
            </form>
        </div>

    @else
        <p>Tu carrito está vacío.</p>
    @endif
</div>
@endsection