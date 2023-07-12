@extends('auth.master')

@section('title', 'Iniciar sesión')

@section('body')
<a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
  <img src="{{ asset('../assets/images/logos/dark-logo.svg') }}" width="180" alt="">
</a>
<p class="text-center">Your Social Campaigns</p>
<form method="post" action="{{ route('login') }}">
  @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Correo electrónico</label>
    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email') }}" autofocus>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-4">
    <label for="password" class="form-label">Contraseña</label>
    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{old('password')}}">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div class="form-check">
      <input name="remeber" class="form-check-input primary" type="checkbox" id="flexCheckChecked" {{ old('remember') ? 'checked' : '' }}>
      <label class="form-check-label text-dark" for="flexCheckChecked">
        Recordarme en este dispositivo
      </label>
    </div>
    {{-- <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a> --}}
  </div>
  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
  	Inicia sesión
  </button>
  <div class="d-flex align-items-center justify-content-center">
    <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
    <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Crear una cuenta</a>
  </div>
</form>
@endsection