@extends('plantillas.navbar')

@section('title', 'Acerca')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            <div class="about">
                <h1>Acerca de Nosotros</h1>
                <div class="left">
                    <img src="{{ asset('imagenes/ropa-limpia.png') }}" alt="Ropa Limpia">
                    <p>Bienvenido a nuestra tienda. Nos dedicamos a ofrecer los mejores productos de ropa y accesorios para nuestros clientes. Nuestra misión es proporcionar una experiencia de compra única y satisfactoria.</p>
                </div>
            </div>

            <div class="about">
                <h2>Nuestra Historia</h2>
                <div class="right">
                    <p>Nuestra tienda fue fundada en el año XXXX con el objetivo de llevar moda de alta calidad a precios accesibles. A lo largo de los años, hemos crecido y expandido nuestra línea de productos para incluir una amplia variedad de estilos y tendencias.</p>
                    <img src="{{ asset('imagenes/bolsa-de-la-compra.png') }}" alt="Bolsa de la Compra">
                </div>
            </div>

            <div class="about">
                <h2>Nuestro Equipo</h2>
                <div class="right">
                    <img src="{{ asset('imagenes/t-shirt_2552388.png') }}" alt="Equipo">
                    <p>Contamos con un equipo dedicado de profesionales que trabajan arduamente para garantizar que cada cliente tenga una experiencia de compra agradable y exitosa. Desde nuestro equipo de atención al cliente hasta nuestros estilistas y diseñadores, todos están comprometidos con la excelencia.</p>
                </div>
            </div>

            <div class="about">
                <h2>Contacto</h2>
                <div class="right">
                    <p>Si tienes alguna pregunta o comentario, no dudes en <a href="{{ url('/contacto') }}">contactarnos</a>. Estamos aquí para ayudarte y asegurarnos de que encuentres exactamente lo que estás buscando.</p>
                    <img src="{{ asset('imagenes/sandalias.png') }}" alt="Contacto">
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
