@extends ('layouts.admin')
@section('title',"Categorías - UVStock")
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<h3>Categorias<a href="categorias/create"></a></h3>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">	
		@include('categorias.create')
		<!-- @include('categorias.search') -->

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
	@can('create categorias')
	<div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
		<div class="text-right">
			<button type="button" class="btn btn-add" data-toggle="modal" data-target="#modal_Categorias_Create">{{__('+ Nuevo')}}</button>
		</div>
	</div>
	@endcan
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			{{--  
			<div class="card-header">
                <h3 class="card-title">Categorias</h3>
              </div>
			  --}}
			<div class="card-body">
				<div class="table-responsive">
					<table id="crud" class="table table-striped table-bordered table-condensed table-hover table-responsive-sm">
						<thead>
							
							<th class="text-center">Nombre</th>
							<th class="text-center">Estado</th>
							<th class="text-center">{{__('Acciones')}}</th>
						</thead>
		                @foreach ($categorias as $categoria)
							<tr>
								
								<td class="text-center">{{$categoria->nombre}}</td>
								<td class="text-center"><button class="btn @if ($categoria->estado==1 or $categoria->estado== "active") btn-success @else btn-danger @endif  btn-sm">@if ($categoria->estado==1 or $categoria->estado=="active") Activo @else Inactivo @endif</button></td>
								<td class="d-flex justify-content-center">
									
									@can('show categorias')
			                        <a href="" data-target="#modal-ver-{{$categoria->id}}" data-toggle="modal" title="Ver datos de este registro"><button class="btn btn-success btn-sm shadow"><i class='fa fa-eye'></i></button></a>
			                        @endcan
									@can('edit categorias')
									<a href="" data-target="#modal-edit-{{$categoria->id}}" data-toggle="modal" title="Editar datos de este registro"><button class="btn btn-info btn-sm shadow"><i class='fa fa-edit'></i></button></a>
									@endcan
									@can('delete categorias')
									<a href="" data-target="#modal-delete-{{$categoria->id}}" data-toggle="modal" title="Eliminar este registro"><button class="btn btn-danger btn-sm shadow"><i class='fa fa-trash'></i></button></a>
			                        @endcan
			                        @can('edit categorias')
			                        <form action="/categorias/{{ $categoria->id}}/estado" method="POST">
									    @csrf
									    <input type="hidden" name="_method" value="POST">
									    <button class="btn btn-{{$categoria->estado ? 'danger' : 'success'}} btn-sm shadow" type="submit">{{ $categoria->estado ? 'Desactivar' : 'Activar' }}</button>
									</form>
									@endcan
								</td>
							</tr>
							@include('categorias.modal')
							@include('categorias.edit')
							@include('categorias.show')
						@endforeach
					</table>
				</div>
			</div>
		</div>
		{{ $categorias->appends(["searchText"=>$searchText])->links() }}
	</div>
</div>
@endsection