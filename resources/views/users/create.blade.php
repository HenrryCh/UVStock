<div class="modal fade" id="modal_Users_Create" tabindex="-1" role="dialog" aria-labelledby="modal_Users_Create_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header colorCreate">
        <h4 class="modal-title" id="modal_Users_Create_LongTitle">{{__('Nuevo')}} Usuario</h4>
        <button type="button" class="btn btn-close btn-success pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>
        {!!Form::open(array('url'=>'users','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
      <div class="modal-body">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
                  <div class="form-group">
                    <label for="cedula">Cedula(*)</label>
                    <input type="text" name="cedula" class="form-control" placeholder="Cedula(*)..." required>
                  </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
                  <div class="form-group">
                  	<label for="nombres">Nombres(*)</label>
                  	<input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres(*)..." onchange="colocarName();" required>
                  </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
                  <div class="form-group">
                    <label for="name">Apellidos(*)</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos(*)..." onchange="colocarName();" required>
                  </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 d-none"> 
                  <div class="form-group">
                    <label for="name">Name(*)</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre(*)...">
                  </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
                  <div class="form-group">
                    <label for="celular">Celular(*)</label>
                    <input type="text" name="celular" class="form-control" placeholder="Celular(*)..." required>
                  </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
                  <div class="form-group">
                  	<label for="email">Email(*)</label>
                  	<input type="email" name="email" class="form-control" placeholder="Email(*)..." required>
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
                  <div class="form-group">
                  	<label for="password">Password(*)</label>
                  	<input type="password" name="password" class="form-control" placeholder="Password(*)..." required>
                  </div>
            </div>

<!--             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
                  <div class="form-group">
                  	<label for="remember_token">Remember Token</label>
                  	<input type="text" name="remember_token" class="form-control" placeholder="Remember Token..." >
                  </div>
            </div> -->
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Rol(*)</label>
                    <select name="idrol" id="idrol" class="form-control" required>
                        <option value="">Seleccionar</option>
                        @foreach ($roles as $rol)
                            <option {{ old('idrol') == $rol->id ? 'selected' : '' }}
                            value="{{$rol->id}}">{{$rol->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="reset">{{__('Cancelar')}}</button>
        <button class="btn btn-primary" type="submit">{{__('Guardar')}}</button>
      </div>
      {!!Form::close()!!} 
    </div>
  </div>
</div>

<script>
  function colocarName(){
    nombres = document.getElementById('nombres').value;
    apellidos = document.getElementById('apellidos').value;
    console.log(nombres, apellidos);
    document.getElementById('name').value=nombres+' '+apellidos;
  }

</script>