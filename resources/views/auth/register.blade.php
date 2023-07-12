@extends('auth.master')

@section('title', 'Registrarse')

@section('body')
<a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
  <img src="{{ asset('../assets/images/logos/dark-logo.svg') }}" width="180" alt="">
</a>
<p class="text-center">Your Social Campaigns</p>
<form method="post" action="{{ route('register') }}">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"" id="name" aria-describedby="textHelp" value="{{ old('name') }}" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Correo electrónico</label>
    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Contraseña</label>
    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-4">
    <label for="password_confirmation" class="form-label">Confirmar la contraseña</label>
    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" value="{{ old('password_confirmation') }}">
    @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
    Registrarse
  </button>
  <div class="d-flex align-items-center justify-content-center">
    <p class="fs-4 mb-0 fw-bold">¿Ya tienes una cuenta?</p>
    <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Inicia sesión</a>
  </div>
</form>
@endsection