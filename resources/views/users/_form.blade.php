<form action="{{ $action }}" method="post">
  @csrf
  @isset ($put)
    @method('PUT')
  @endisset
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $user->name)}}" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="cargo" class="form-label">Cargo</label>
    <input name="cargo" type="text" class="form-control @error('cargo') is-invalid @enderror" id="cargo" value="{{ old('cargo', $user->cargo)}}">
    @error('cargo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-4">
    <label for="email" class="form-label">Correo electrónico</label>
    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $user->email)}}" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">La persona iniciará sesión con este correo electrónico</div>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Dejar en blanco para no modificar la contraseña">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Roles</label>
    <div>
      @foreach ($roles as $rol)
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            name="roles[]"
            value="{{ $rol->id }}"
            id="rol_{{ $rol->id }}"
            @checked(collect(old('roles') ?? $user->roles->pluck('id')->toArray())->contains($rol->id))
            >
            <label class="form-check-label" for="rol_{{ $rol->id }}">{{ $rol->name }}</label>
          </div>
      @endforeach
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>