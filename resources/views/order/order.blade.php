@extends('layouts.app')
@push('stylesheet')
  {{-- <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('order.show',[$provider->id,$order->id]))
  @slot('color', 'dark')
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
                  @foreach ($order->detailsOrder as $or)
                  <tr>
                    <td>{{ $id++ }}</td>
                    <td>{{ $or->product->code }}</td>
                    <td>{{ $or->product->name }}</td>
                    <td>$ {{ $or->getPrice() }}</td>
                    <td>{{ $or->quantity }}</td>
                    <td>$ {{ $or->getTotal() }}</td>
                    <td>
                      <button class="btn btn-sm btn-danger" 
                      data-toggle="modal" 
                      data-target="#addProduct"
                      data-id="{{ $or->id }}">
                      <i class="fa fa-trash"></i>
                      </button>
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
                <th>Tipo</th>
                <th>Valor</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($order->provider->detailsProduct as $dp)
                <tr>
                  <td>
                    <div class="product-img">
                      <img src="{{ $dp->product->presenter()->getPhoto() }}" alt="Product Image" class="img-size-50">
                    </div>
                  </td>
                  <td>{{ $dp->product->code }}</td>
                  <td>{{ $dp->product->name }}</td>
                  <td>{{ $dp->product->description }}</td>
                  <td>$ {{ $dp->price }}</td>
                  <td>{{ $dp->quantity }}</td>
                  <td>{{ $dp->getTotal() }}</td>
                  <td>
                    <button class="btn btn-sm btn-primary"
                    data-toggle="modal"
                    data-target="#addProduct"
                    data-id="{{$dp->id}}"
                    data-price="{{$dp->price}}"
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
@include('order._modal_add_product')
@endsection
@push('javascript')
<script>
  $(function () {
    $('#addProduct').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);

      var inputPrice = button.data('price');
      var inputIdProduct = button.data('id');

      var url = "{{route('provider.order.details.store',[$provider->id,$order->id])}}";
      modal.find('.modal-title').text('¿Desea agregar este producto?');
      console.log(inputPrice);
      console.log("here");

      modal.find('#inputIdProduct').val(inputIdProduct);
      modal.find('#inputPrice').val(inputPrice);
      modal.find('#inputQuantity').val(1).change();
      modal.find('#formAdd').attr('action',url);
      // totalNumber()
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var id = button.data('id');
        var provider_id = {{ $provider->id }};

        var url = "{{route('provider.order.details.destroy',[$provider->id,$order->id])}}";
        modal.find('.modal-title').text('¿Desea eliminar producto?');
        modal.find('#inputDeleteId').val(id);
        modal.find('#inputDeleteData').val(provider_id);
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