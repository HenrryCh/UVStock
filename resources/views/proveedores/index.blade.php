@extends ('layouts.admin')
@section('title',"Proveedores - UVStock")
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<h3>Proveedores<a href="proveedores/create"></a></h3>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">	
		@include('proveedores.create')
		<!-- @include('proveedores.search') -->

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
	@can('create proveedores')
	<div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
		<div class="text-right">
			<button type="button" class="btn btn-add"  data-toggle="modal" data-target="#modal_Proveedores_Create">{{__('+ Nuevo')}}</button>
		</div><br>
	</div>
	@endcan
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			{{--  
			<div class="card-header">
                <h3 class="card-title">Proveedores</h3>
            </div>
			  --}}
			<div class="card-body">
				<div class="table-responsive">
					<table id="crud" class="table table-striped table-bordered table-condensed table-hover table-responsive-sm">
						<thead>
							
							<th class="text-center">Nombre</th>
							<th class="text-center">Encargado</th>
							<th class="text-center">Ruc</th>
							<th class="text-center">Telefono</th>
							<th class="text-center">Correo</th>
							<th class="text-center">Direccion</th>
							<th class="text-center">Estado</th>
							<th class="text-center">{{__('Acciones')}}</th>
						</thead>
		                @foreach ($proveedores as $proveedore)
							<tr>
								
								<td class="text-center">{{$proveedore->nombre}}</td>
								<td class="text-center">{{$proveedore->encargado}}</td>
								<td class="text-center">{{$proveedore->ruc}}</td>
								<td class="text-center">{{$proveedore->telefono}}</td>
								<td class="text-center">{{$proveedore->correo}}</td>
								<td class="text-center">{{$proveedore->direccion}}</td>
								<td class="text-center"><button class="btn @if ($proveedore->estado==1 or $proveedore->estado== "active") btn-success @else btn-danger @endif  btn-sm">@if ($proveedore->estado==1 or $proveedore->estado=="active") Activo @else Inactivo @endif</button></td>
								<td class="d-flex justify-content-center">
									@can('show proveedores')
			                        <a href="" data-target="#modal-ver-{{$proveedore->id}}" data-toggle="modal" title="Ver datos de este registro"><button class="btn btn-success btn-sm shadow"><i class='fa fa-eye'></i></button></a>
			                        @endcan
									@can('edit proveedores')
									<a href="" data-target="#modal-edit-{{$proveedore->id}}" data-toggle="modal" title="Editar datos de este registro"><button class="btn btn-info btn-sm shadow"><i class='fa fa-edit'></i></button></a>
									@endcan
									@can('delete proveedores')
									<a href="" data-target="#modal-delete-{{$proveedore->id}}" data-toggle="modal" title="Eliminar este registro"><button class="btn btn-danger btn-sm shadow"><i class='fa fa-trash'></i></button></a>
			                        @endcan
			                        @can('edit proveedores')
			                        <form action="/proveedores/{{ $proveedore->id}}/estado" method="POST">
									    @csrf
									    <input type="hidden" name="_method" value="POST">
									    <button class="btn btn-{{$proveedore->estado ? 'danger' : 'success'}} btn-sm shadow" type="submit">{{ $proveedore->estado ? 'Desactivar' : 'Activar' }}</button>
									</form>
									@endcan
								</td>
							</tr>
							@include('proveedores.modal')
							@include('proveedores.edit')
							@include('proveedores.show')
						@endforeach
					</table>
				</div>
			</div>
		</div>
		{{ $proveedores->appends(["searchText"=>$searchText])->links() }}
	</div>
</div>
@endsection