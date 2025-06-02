<!-- resources/views/cart/checkout.blade.php -->
@extends('plantillas.navbar')

@section('title', 'Pago Exitoso')

@section('content')
<div class="container mt-5">
    <h1>Pago Exitoso</h1>
    <p>Tu pago ha sido procesado con éxito. Gracias por tu compra.</p>
    <a href="{{ url('/inicio') }}" class="btn btn-primary">Volver al Inicio</a>
</div>
@endsection
