@extends('plantillas.navbar')

@section('title', 'Detalles del Producto')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ url($product->image) }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <p><strong>Tamaño:</strong> {{ $product->size }}</p>
                <p><strong>Color:</strong> {{ $product->color }}</p>
                <p><strong>Precio:</strong> ${{ $product->price }}</p>
                <button class="btn btn-primary">Agregar al Carrito</button>
            </div>
        </div>
    </div>
@endsection
