@extends('modernizer.master')

@section('title', 'Listado Personal')

@section('body')
<div class="row">
	<div class="col-lg-12 d-flex align-items-strech">
		<div class="card w-100">
			<div class="card-body">
				<div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
					<h5 class="card-title fw-semibold">Personal</h5>
                  </div>
                  <div>
                  	<a class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" href="{{ route('users.create') }}">Crear personal</a>
                  </div>
                </div>
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Cargo</th>
							<th>Email</th>
							<th>Rol</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->cargo }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->roles->pluck('name')->join(', ') }}</td>
								<td><a href="{{ route('users.edit', $user) }}">Editar</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection