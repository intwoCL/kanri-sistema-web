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
            <a href="{{ route('types.index') }}" class="nav-link"><i class="fas fa-sort-amount-up-alt"></i> {{ trans('t.user.products.type') }}</a>
            <a href="{{ route('unit.index') }}" class="nav-link"><i class="fa fa-weight fa-xs mr-2"></i> {{ trans('t.user.products.unit') }}</a>
            <a href="{{ route('category.index') }}" class="nav-link"><i class="fa fa-tags fa-xs mr-2"></i> {{ trans('t.user.products.category') }}</a>
            <a href="{{ route('product.index') }}" class="nav-link"><i class="fas fa-box"></i>
            {{ trans('t.user.products.product') }}</a>
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
            <a href="{{ route('client.index') }}" class="nav-link"><i class="fas fa-user-tie"></i> {{ trans('t.user.system.clients') }}</a>
            <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-user-circle"></i> {{ trans('t.user.system.users') }}</a>
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
            <a href="{{ route('budget.index') }}" class="nav-link"><i class="fas fa-file-invoice"></i> {{ trans('t.user.quote.budget') }}</a>
            <a href="{{ route('cart.index') }}" class="nav-link"><i class="fas fa-shopping-cart"></i> {{ trans('t.user.quote.cart') }}</a>
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
            <a href="{{ route('company.index') }}" class="nav-link"><i class="fa fa-cog fa-xs mr-2"></i> {{ trans('t.user.settings.my_company') }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')

@endpush