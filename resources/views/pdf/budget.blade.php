<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Presupuesto</title>

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
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-5">
        <div class="card">
          <div class="card-header">
            <img style="float:right" src=".{{ $company->presenter()->getLogo() }}" width="200" alt="Logo PPEquipamientos">
            {{-- {{ $company->presenter()->getLogo() }} --}}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title"><strong>Datos de la empresa:</strong></h5>
            </div>
            @include('partials._info_pdf')
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="card">
            <div class="card-header">
              <h4 align="center"><strong>Presupuesto N°: {{ $budget->id }}</strong></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title"><strong>Datos de cliente: </strong></h5>
              @include('partials._info_client')
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
              <strong>Servicios: </strong>
            </div>
            <br>
            <div class="card-body p-0">
              <table width="100%">
                <thead style="background-color: lightgray;">
                  <tr>
                    <th>#</th>
                    <th>Servicio</th>
                    <th>Valor</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @php $id = 1; @endphp
                  @foreach ($budget->detailsService as $ds)
                  <tr>
                    <th scope="row">{{ $id++ }}</th>
                    <td align="center">{{ $ds->name_service }}</td>
                    <td align="right">$ {{ $ds->getUniqueValue() }}</td>
                    <td align="right">$ {{ $ds->getUniqueValue() }}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2"></td>
                    <td align="right">Subtotal</td>
                    <td align="right">$ {{ $budget->getSubtotal() }}</td>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                    <td align="right">IVA</td>
                    <td align="right">{{ $budget->iva }}%</td>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                    <td align="right">Total</td>
                    <td align="right">$ {{ $budget->getTotal() }}</td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
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
                    <th>Valor unitario</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @php $id = 1; @endphp
                  @foreach ($budget->detailsProduct as $dp)
                  <tr>
                    <th scope="row">{{ $id++ }}</th>
                    <td align="center">{{ $dp->product->code }}</td>
                    <td align="center">{{ $dp->product_name }}</td>
                    <td align="right">$ {{ $dp->getUnitValue() }}</td>
                    <td align="center">{{ $dp->quantity }}</td>
                    <td align="right">$ {{ $dp->getTotal() }}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="4"></td>
                    <td align="right">Subtotal</td>
                    <td align="right">$ {{ $budget->getSubtotal() }}</td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td align="right">IVA</td>
                    <td align="right">{{ $budget->iva }}%</td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td align="right">Total</td>
                    <td align="right">$ {{ $budget->getTotal() }}</td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
</body>
</html>