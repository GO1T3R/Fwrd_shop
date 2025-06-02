@extends('plantillas.navbar')

@section('title', 'Pantalones')

@section('content')


<body>
    <div class="container mt-5">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">${{ $product->price }}</p>
                            <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection