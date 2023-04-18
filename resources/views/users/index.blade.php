@extends ('layouts.admin')
@section('title',"Usuarios - UVStock")
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<br>
		<h4>Usuarios<a href="users/create"></a></h4>
	</div>
	
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">	
		@include('users.create')
		{{-- Buscador superior --}}
		<!-- @include('users.search') -->

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif
	</div>
	<div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
		<div class="text-right">
			<button type="button" class="btn btn-add" data-toggle="modal" data-target="#modal_Users_Create">{{__('+ Nuevo')}}</button>
		<br>
		<br>
		</div>
	</div>
</div>
{{-- Librerias 
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
@endsection
--}}
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">

					<table id="crud" class="table table-striped table-bordered table-condensed table-hover table-sm">
						<thead>
							<th>N° Cedula</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Celular</th>
							<th>Email</th>
							<th>Rol</th>
							<th>Estado</th>
							<th class="text-center">{{__('Opciones')}}</th>
						</thead>
		               @foreach ($userss as $users)
						<tr>
							<td>{{$users->cedula}}</td>
							<td>{{$users->nombres}}</td>
							<td>{{$users->apellidos}}</td>
							<td>{{$users->celular}}</td>
							<td>{{$users->email}}</td>
							<td>{{$users->getRoleNames()->join(', ') }}</td>
							<td class="text-center"><button class="btn @if ($users->deleted_at==null) btn-success @else btn-danger @endif  btn-sm">@if ($users->deleted_at==null) Activo @else Inactivo @endif</button></td>
							<td class="d-flex justify-content-center">
								<a href="" data-target="#modal-ver-{{$users->id}}" data-toggle="modal" title="Ver datos de este registro"><button class="btn btn-success btn-sm shadow"><i class='fa fa-eye'></i></button></a>
								<a href="" data-target="#modal-edit-{{$users->id}}" data-toggle="modal" title="Editar datos de este registro"><button class="btn btn-info btn-sm shadow"><i class='fa fa-edit'></i></button></a>
								<a href="" data-target="#modal-delete-{{$users->id}}" data-toggle="modal" title="Eliminar este registro"><button class="btn btn-danger btn-sm shadow"><i class='fa fa-trash'></i></button></a>
		                       
		                        @can('edit users')
		                        <form action="/users/{{ $users->id}}/estado" method="POST">
								    @csrf
								    <input type="hidden" name="_method" value="POST">
								    <button class="btn btn-{{$users->deleted_at==null ? 'danger' : 'success'}} btn-sm shadow" type="submit" {{ $users->getRoleNames()->join(', ') =='Admin' ? 'disabled' :'' }}>{{ $users->deleted_at==null ? 'Desactivar' : 'Activar' }}</button>
								</form>
								@endcan
								
							</td>
						</tr>
						@include('users.modal')
						@include('users.edit')
						@include('users.show')
						@endforeach
					</table>
				</div>
				{{$userss->render()}}
			</div>
		</div>
	</div>
</div>
{{--  
@section('js')
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
@endsection
--}}
@endsection