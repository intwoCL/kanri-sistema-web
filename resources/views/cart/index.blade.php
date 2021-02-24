@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  {{-- @slot('route', route('budget.show',$budget->id)) --}}
  {{-- @slot('color', 'dark') --}}
  @slot('body', "Vista de presupuesto")
@endcomponent
<section class="content">
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card title">Productos</h3>
            </div>
            <a href="{{ route('cart.delete') }}">delete</a>
            <div class="card-body table-responsive">
              <table class="table table-bordered table-hover table-sm">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Producto</th>
                  <th>Nombre producto</th>
                  <th>Valor</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                  @php $id = 1; @endphp
                  @foreach ($mis_productos as $mp)
                  <tr>
                    <td>{{ $id++ }}</td>
                    <td>{{ $mp['code'] }}</td>
                    <td>{{ $mp['name'] }}</td>
                    {{-- <td>$ {{ $dp->getUnitValue() }}</td>
                    <td>{{ $dp->quantity }}</td>
                    <td>$ {{ $dp->getTotal() }}</td>
                    <td>
                      <button class="btn btn-sm btn-danger"
                      data-toggle="modal"
                      data-target="#addProduct"
                      data-id="{{ $dp->id }}">
                      <i class="fa fa-trash"></i>
                      </button>
                    </td> --}}
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listado de Productos</h3>
          </div>
          <div class="card-body table-responsive">
            <table id="table" class="table table-bordered table-hover table-sm">
              <thead>
              <tr>
                <th>Imagen</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Costo</th>
                <th>Precio</th>
                <th>Tipo</th>
                <th>Stock D.</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($products as $prod)
                <tr>
                  <td>
                    <div class="product-img">
                      <img src="{{ $prod->presenter()->getPhoto() }}" alt="Product Image" class="img-size-50">
                    </div>
                  </td>
                  <td>{{ $prod->code }}</td>
                  <td>{{ $prod->name }}</td>
                  <td>{{ $prod->description }}</td>
                  <td>$ {{ $prod->getImportPrice() }}</td>
                  <td>$ {{ $prod->getCreditPrice() }}</td>
                  <td>{{ $prod->productType->name }}</td>
                  <td>{{ $prod->available_stock }}</td>
                  <td>
                    <button class="btn btn-sm btn-primary"
                    data-toggle="modal"
                    data-target="#addProduct"
                    data-id="{{$prod->id}}"
                    data-name="{{$prod->name}}"
                    data-price="{{$prod->credit_price}}"
                    >Añadir</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('budget._modal_add_product')
@include('budget._delete')
@endsection
@push('javascript')
<script>
  $(function () {
    $('#addProduct').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);

      var inputPrice = button.data('price');
      var inputIdProduct = button.data('id');
      var inputName = button.data('name');

      var url = "{{route('cart.product')}}";
      modal.find('.modal-title').text('¿Desea agregar este producto?');
      console.log(inputPrice);
      console.log("here");

      modal.find('#inputIdProduct').val(inputIdProduct);
      modal.find('#inputPrice').val(inputPrice);
      modal.find('#inputQuantity').val(1).change();
      modal.find('#formAdd').attr('action',url);
      // totalNumber();
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var id = button.data('id');
        var budget_id = 1;

        var url = "{{route('cart.product')}}";
        modal.find('.modal-title').text('¿Desea eliminar producto?');
        modal.find('#inputDeleteId').val(id);
        modal.find('#inputDeleteData').val(budget_id);
        modal.find('#formDelete').attr('action',url);
      });
  });
  function totalNumber() {
    var count,price,total,text;
    count = document.getElementById("inputQuantity").value;
    price = document.getElementById("inputPrice").value;
    if (isNaN(count) || isNaN(price)) {
      text = "Es necesarios introducir dos números válidos";
    } else {
      total = parseFloat(count)*parseFloat(price);
      if (total<0) {
        total = "No se puede ingresar";
      }
      text = total;
    }
      document.getElementById("inputTotal").value = text;
  }
</script>
@endpush