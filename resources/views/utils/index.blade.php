@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('route', '')
  @slot('color', 'dark')
  @slot('body', "Bienvenido")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              PRODUCTOS
            </h3>
          </div>
          <div class="card-body">
            <a href="{{ route('types.index') }}" class="nav-link"><i class="fas fa-sort-amount-up-alt"></i> Tipo</a>
            <a href="{{ route('unit.index') }}" class="nav-link"><i class="fa fa-weight fa-xs mr-2"></i> Unidad</a>
            <a href="{{ route('category.index') }}" class="nav-link"><i class="fa fa-tags fa-xs mr-2"></i> Categoría</a>
            <a href="{{ route('product.index') }}" class="nav-link"><i class="fas fa-box"></i>
            Producto</a>
          </div>
        </div>
      </div>

      <div class="col-md-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              SISTEMA
            </h3>
          </div>
          <div class="card-body">
            <a href="{{ route('client.index') }}" class="nav-link"><i class="fas fa-user-tie"></i> Clientes</a>
            <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-user-circle"></i> Usuarios</a>
          </div>
        </div>
      </div>

      <div class="col-md-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              COTIZACIÓN
            </h3>
          </div>
          <div class="card-body">
            <a href="{{ route('budget.index') }}" class="nav-link"><i class="fas fa-file-invoice"></i> Presupuesto</a>
            <a href="{{ route('cart.index') }}" class="nav-link"><i class="fa fa-user fa-xs mr-2"></i> Carrito</a>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              Configuración
            </h3>
          </div>
          <div class="card-body">
            <a href="{{ route('company.index') }}" class="nav-link"><i class="fa fa-cog fa-xs mr-2"></i> Mi empresa</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')

@endpush