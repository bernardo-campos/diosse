@extends('modernizer.master')

@section('title', 'Crear Personal')

@section('body')
<div class="row">
	<div class="col-lg-12 d-flex align-items-strech">
		<div class="card w-100">
			<div class="card-body">
				<div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
					<h5 class="card-title fw-semibold">Crear Personal</h5>
                  </div>
                  <div>
                  	<a class="btn w-100 py-8 fs-4 mb-4 rounded-2" href="{{ route('users.index') }}">Volver</a>
                  </div>
                </div>

            	@include('users._form', [
            		'action' => route('users.store'),
            		'roles' => $roles,
            		'user' => new App\Models\User(),
            	])

            </div>
        </div>
    </div>
</div>
@endsection