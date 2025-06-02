@extends('plantillas.navbar', ['hideFooter' => true])

@section('title', 'Register')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; padding-top: 70px;">
    <div class="card shadow p-4" style="min-width: 350px; max-width: 500px; width: 100%;">
        <div class="text-center mb-4">
                <a class="navbar-brand" href="{{url ('/inicio')}}" id="tittle-logo">frwd</a>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Nombre') }}</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Correo electrónico') }}</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="form-label">{{ __('Confirmar contraseña') }}</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('login') }}" class="text-decoration-none">{{ __('¿Ya estás registrado?') }}</a>

                <button type="submit" class="btn btn-primary">
                    {{ __('Registrarse') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
