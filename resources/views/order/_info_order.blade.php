<div class="card-body p-0">
  <table class="table table-sm">
    <tbody>
      <tr>
        <td>Código orden: </td>
        <td>{{ $order->order_code }}</td>
      </tr>
      <tr>
        <td>Usuario: </td>
        <td>
          {{ $provider->presenter()->getFullName() }}
        </td>
      </tr>
      <tr>
        <td>Fecha Emisión: </td>
        <td>{{ $order->getDateIn()->getDate() }}</td>
      </tr>
      <tr>
        <td>Fecha Término: </td>
        <td>@if ($order->delivery_date)
          {{ $order->getDateOut()->getDate() }}
        @endif</td>
      </tr>
      <tr>
        <td>Comentario: </td>
        <td> {{ $order->comment }}</td>
      </tr>
      <tr>
        <td>Descuento: </td>
        <td>{{ $order->discount }}%</td>
      </tr>
      <tr>
        <td>IVA: </td>
        <td>{{ $order->iva }}%</td>
      </tr>
      <tr>
        <td>Subtotal: </td>
        <td>$ {{ $order->getSubtotal() }}</td>
      </tr>
      <tr>
        <td>Total: </td>
        <td>$ {{ $order->getTotal() }}</td>
      </tr>
      <tr>
        <td>Estado: </td>
        <td>{{ $order->presenter()->status() }}</td>
      </tr>
    </tbody>
  </table>
</div>