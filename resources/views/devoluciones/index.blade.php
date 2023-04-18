@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Devoluciones</h3>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">	
		<!-- @include('devoluciones.search') -->
	</div>
	@can('create devoluciones')
	<div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
		<div class="text-right">
			<a href="devoluciones/create" title="Registrar Devoluciones"><button class="btn btn-add shadow">{{__('+ Nuevo')}}</button></a>
		</div>
	</div>
	@endcan
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="card-header">
                <h3 class="card-title">Devoluciones</h3>
              </div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="crud" class="table table-striped table-bordered table-condensed table-hover table-responsive-sm">
						<thead>
							<th class="text-left">Nombre</th>
							<th class="text-left">Telefono</th>
							<th class="text-right">Fecha</th>
							<th class="text-center">Estado</th>
							<th class="text-center">{{__('Opciones')}}</th>
						</thead>
		               @foreach ($devoluciones as $devolucione)
						<tr>
							<td class="text-left">{{$devolucione->nombre}}</td>
							<td class="text-left">{{$devolucione->telefono}}</td>
							<td class="text-right">{{$devolucione->fecha}}</td>
							<td class="text-center"><button class="btn btn-{{$devolucione->estado ? 'warning' : 'success'}} btn-sm" >@if ($devolucione->estado==1 or $devolucione->estado=="active") Pendiente @else Finalizado @endif</button></td>
							<td class="d-flex justify-content-center">
								<!-- @can('edit devoluciones')
								<a href="{{URL::action('App\Http\Controllers\DevolucionesControlador@edit',$devolucione->id)}}" title="Editar datos de este registro"><button class="btn btn-warning btn-sm shadow mx-1"><i class='fa fa-edit'></i></button></a>
		                        @endcan
		                        @can('delete devoluciones')
		                        <a href="" data-target="#modal-delete-{{$devolucione->id}}" data-toggle="modal" title="Eliminar este registro"><button class="btn btn-danger btn-sm shadow mx-1"><i class='fa fa-trash'></i></button></a>
		                        @endcan -->
		                        @can('show devoluciones')
		                        <a href="{{URL::action('App\Http\Controllers\DevolucionesControlador@show',$devolucione->id)}}" title="Ver datos de este registro"><button class="btn btn-info btn-sm shadow mx-1"><i class='fa fa-eye'></i></button></a>
		                        @endcan
		                        @can('edit devoluciones')
			                        <form action="/devoluciones/{{ $devolucione->id}}/estado" method="POST">
									    @csrf
									    <input type="hidden" name="_method" value="POST">
									    <button class="btn btn-{{$devolucione->estado ? 'warning' : 'success'}} btn-sm shadow mx-1" type="submit">{{ $devolucione->estado ? 'Finalizar' : 'Activar' }}</button>
									</form>
									@endcan
							</td>
						</tr>
						@include('devoluciones.modal')
						@endforeach
					</table>
				</div>
			</div>
		</div>
		{{ $devoluciones->appends(["searchText"=>$searchText])->links() }}
	</div>
</div>

@endsection