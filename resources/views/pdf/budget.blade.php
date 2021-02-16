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
  <div class="row">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-header">
          <img style="float:right" src="dist/image/logo2.png" alt="Logo PPEquipamientos" width="35%">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-header">
          <strong>Datos de la empresa</strong>
          <div class="card-body p-0">
            <table class="table-sm">
              <tbody>
                <tr>
                  <br>
                  <td><strong>RUT: </strong></td>
                  <td>14.285.735-9</td>
                </tr>
                <tr>
                  <td><strong>Dueño: </strong></td>
                  <td>Pablo Peña Paredes</td>
                </tr>
                <tr>
                  <td><strong>Dirección: </strong></td>
                  <td>Santa Sara 11826 - El Bosque</td>
                </tr>
                <tr>
                  <td><strong>Región: </strong></td>
                  <td>Región Metropolitana</td>
                </tr>
                <tr>
                  <td><strong>Ciudad: </strong> </td>
                  <td>Santiago - Chile</td>
                </tr>
                <tr>
                  <td><strong>Teléfono: </strong></td>
                  <td>+56 9 9249 3849</td>
                </tr>
                <tr>
                  <td><strong>Correo electrónico: </strong></td>
                  <td>ppena@ppequipamientos.cl</td>
                </tr>
                <tr>
                  <td><strong>Página web: </strong></td>
                  <td>www.ppequipamientos.cl</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
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
          <strong>Datos de cliente: </strong>
        </div>
        <div class="card-body p-0">
          <table class="table-sm">
            <tr>
              <td><strong>RUT:</strong></td>
              <td>{{ !empty($budget->client) ? $budget->client->rut : 'N/A' }}</td>
            </tr>
            <tr>
              <td><strong>Cliente: </strong></td>
              <td>Soc. de Tranporte JP Ltda</td>
            </tr>
            <tr>
              <td><strong>Encargado: </strong></td>
              <td>
                {{ !empty($budget->client) ? $budget->client->presenter()->getFullName() : 'N/A' }}
              </td>
            </tr>
            <tr>
              <td><strong>Condición de pago: </strong></td>
              <td>Contado</td>
            </tr>
            <tr>
              <td><strong>Fecha: </strong></td>
              <td>{{ $budget->getDateIn()->getDate() }}</td>
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
                <td align="right">$ {{ $ds->total }}</td>
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

</body>
</html>