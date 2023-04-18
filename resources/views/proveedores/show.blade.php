<!-- proveedores show.blade.php    Ver Detalle de Proveedores -->
<div class="modal fade" id="modal-ver-{{$proveedore->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_proveedores_Ver_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header colorShow">
        <h4 class="modal-title" id="modal_proveedores_Ver_LongTitle">Detalle de Proveedor</h4>
        <button type="button" class="btn btn-close btn-info" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      {!!Form::model($proveedores,['method'=>'GET','route'=>['proveedores.index']])!!}
      {{Form::token()}}
      <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
           		<div class="form-group">
	            	<label for="nombre">Nombre *</label>
	            	<input type="text" name="nombre" class="form-control" value="{{$proveedore->nombre}}" disabled>
	            </div>
            </div>
            
            <div class="col-lg-6">
           		<div class="form-group">
	            	<label for="encargado">Encargado *</label>
	            	<input type="text" name="encargado" class="form-control" value="{{$proveedore->encargado}}" disabled>
	            </div>
            </div>
            
            <div class="col-lg-6">
           		<div class="form-group">
	            	<label for="ruc">Ruc *</label>
	            	<input type="text" name="ruc" class="form-control" value="{{$proveedore->ruc}}" disabled>
	            </div>
            </div>
            
            <div class="col-lg-6">
           		<div class="form-group">
	            	<label for="telefono">Telefono *</label>
	            	<input type="text" name="telefono" class="form-control" value="{{$proveedore->telefono}}" disabled>
	            </div>
            </div>
            
            <div class="col-lg-6">
           		<div class="form-group">
	            	<label for="correo">Correo *</label>
	            	<input type="text" name="correo" class="form-control" value="{{$proveedore->correo}}" disabled>
	            </div>
            </div>
            
            <div class="col-lg-6">
           		<div class="form-group">
	            	<label for="direccion">Direccion</label>
	            	<input type="text" name="direccion" class="form-control" value="{{$proveedore->direccion}}" disabled>
	            </div>
            </div>
            
            <div class="col-lg-6">
                  <div class="form-group">
                    <div class="col-lg-3">
                        <label>Estado(*)</label>
                        <button class="btn @if ($proveedore->estado==1 or $proveedore->estado== "active") btn-success @else btn-danger @endif  btn-sm">@if ($proveedore->estado==1 or $proveedore->estado=="active") Activo @else Inactivo @endif</button>
                    </div>
                  </div>
            </div>

            
          </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" data-dismiss="modal" title="Regresar al Listado Anterior">{{__('Volver')}}</a>
      </div>
      {!!Form::close()!!} 
    </div>
  </div>
</div>