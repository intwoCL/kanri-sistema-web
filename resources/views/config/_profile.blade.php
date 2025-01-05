<div class="tab-pane fade show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Actualizar Usuario</h3>
        </div>
        <form class="form-horizontal form-submit" method="POST" action="{{ route('settings.profile') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="inputNombres" class="col-sm-2 col-form-label">Nombre Completo</label>
            <div class="col-sm-5">
              <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" name="first_name" id="first_name" autocomplete="new-first-name" value="{{ $u->first_name }}" placeholder="Nombres" required>
              {!! $errors->first('first_name', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
            </div>
            <div class="col-sm-5">
              <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" name="last_name" id="last_name" autocomplete="new-last_name" value="{{ $u->last_name }}" placeholder="Apellidos" required>
              {!! $errors->first('last_name', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
            <div class="col-sm-10">
              <input type="mail" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" value="{{ $u->email }}" placeholder="example@correo.cl" required>
              {!! $errors->first('email', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
            </div>
          </div>
          <div class="form-group">
            <label class="col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
            <div class="input-group">
              <img src="{{ $u->presenter()->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="file" name="photo" accept="image/*" onchange="preview(this)" />
              <br>
            </div>
          </div>
          <div class="form-group row center-text">
            <div id="preview"></div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success float-right">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>