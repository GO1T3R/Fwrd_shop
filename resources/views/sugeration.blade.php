@extends('plantillas.navbar')

@section('title', 'Inicio')

@section('content')

<!-- Gallery -->
<div class="row">
    @foreach ($products as $product)
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <a href="{{ route('products.show', $product->id) }}" target="_blank">
            <img
                src="{{ url($product->image) }}"
                class="w-100 shadow-1-strong rounded mb-4"
                alt="{{ $product->name }}"
            />
        </a>
        </div>
    @endforeach
</div>

@endsection
