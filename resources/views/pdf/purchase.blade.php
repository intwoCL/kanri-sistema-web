<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Orden de Compra</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    img {
      dip
    }
</style>

</head>
<body>
  <div class="row">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-header">
          <img style="float:right" src=".{{ $company->presenter()->getLogo() }}" alt="Logo PPEquipamientos" width="35%">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-header">
          <div class="card-body p-0">
            @include('partials._info_pdf')
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-header">
          <h4 align="center"><strong>Orden de Compra N°: {{ $order->id }}</strong></h4>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><strong>Emitir Factura a: </strong></h4>
        </div>
        <div class="card-body p-0">
          <table class="table-sm">
            <tr>
              <td><strong>RUT:</strong></td>
              {{-- <td>{{ !empty($budget->client) ? $budget->client->rut : 'N/A' }}</td> --}}
            </tr>
            <tr>
              <td><strong>Cliente: </strong></td>
              <td>Soc. de Tranporte JP Ltda</td>
            </tr>
            <tr>
              <td><strong>Encargado: </strong></td>
              {{-- <td>
                {{ !empty($budget->client) ? $budget->client->presenter()->getFullName() : 'N/A' }}
              </td> --}}
            </tr>
            <tr>
              <td><strong>Condición de pago: </strong></td>
              <td>Contado</td>
            </tr>
            <tr>
              <td><strong>Fecha de Emisión: </strong></td>
              <td>{{ $order->getDateIn()->getDate() }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><strong>Proveedor: </strong></h4>
        </div>
        <div class="card-body p-0">
          <table class="table-sm">
            <tr>
              <td><strong>RUT:</strong></td>
              <td>{{ !empty($provider->rut) ? $provider->rut : 'N/A' }}</td>
            </tr>
            <tr>
              <td><strong>Cliente: </strong></td>
              <td>Soc. de Tranporte JP Ltda</td>
            </tr>
            <tr>
              <td><strong>Encargado: </strong></td>
              <td>
                {{ !empty($provider->presenter()->getFullName()) ? $provider->presenter()->getFullName() : 'N/A' }}
              </td>
            </tr>
            <tr>
              <td><strong>Condición de pago: </strong></td>
              <td>Contado</td>
            </tr>
            <tr>
              <td><strong>Fecha de Entrega: </strong></td>
              <td>@if ($order->delivery_date)
                {{ $order->getDateOut()->getDate() }}
              @endif</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

  <br>
  <br>

  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <strong>Productos: </strong>
        </div>
        <br>
        <div class="card-body p-0">
          <table width="100%">
            <thead style="background-color: lightgray;">
              <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Nombre Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @php $id = 1; @endphp
              @foreach ($order->detailsOrder as $do)
              <tr>
                <th scope="row">{{ $id++ }}</th>
                <td align="center">{{ $do->product->code }}</td>
                <td align="center">{{ $do->product->name }}</td>
                <td align="right">$ {{ $do->getPrice() }}</td>
                <td align="center">{{ $do->quantity }}</td>
                <td align="right">$ {{ $do->getTotal() }}</td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colspan="4"></td>
                <td align="right">Subtotal</td>
                <td align="right">$ {{ $order->getSubtotal() }}</td>
              </tr>
              <tr>
                <td colspan="4"></td>
                <td align="right">IVA</td>
                <td align="right">{{ $order->iva }}%</td>
              </tr>
              <tr>
                <td colspan="4"></td>
                <td align="right">Total</td>
                <td align="right">$ {{ $order->getTotal() }}</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>

</body>
</html>