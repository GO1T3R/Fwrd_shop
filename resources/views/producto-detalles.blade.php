<!-- resources/views/product-details.blade.php -->
@extends('plantillas.navbar')

@section('title', 'Detalles del Producto')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>Precio: ${{ $product->price }}</p>
                <p>Talla: {{ $product->size }}</p>
                <p>Color: {{ $product->color }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                </form>
            </div>
        </div>
    </div>
@endsection
