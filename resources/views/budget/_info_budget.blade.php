<div class="card-body p-0">
  <table class="table table-sm">
    <tbody>
      <tr>
        <td>Cliente: </td>
        <td>
          {{ !empty($budget->client) ? $budget->client->presenter()->getFullName() : 'N/A' }}
        </td>
      </tr>
      <tr>
        <td>Usuario: </td>
        <td>{{ $budget->user->presenter()->getFullName() }}</td>
      </tr>
      <tr>
        <td>Fecha Inicio: </td>
        <td>{{ $budget->getDateIn()->getDate() }} {{ $budget->getDateIn()->getTime() }}</td>
      </tr>
      <tr>
        <td>Fecha Termino: </td>
        <td>{{ $budget->getDateOut()->getDate() }} {{ $budget->getDateOut()->getTime() }}</td>
      </tr>
      <tr>
        <td>SubTotal: </td>
        <td>$ {{ $budget->getSubtotal() }}</td>
      </tr>
      <tr>
        <td>IVA: </td>
        <td>{{ $budget->iva }}%</td>
      </tr>
      <tr>
        <td>Total: </td>
        <td><strong>$ {{ $budget->getTotal() }}</strong></td>
      </tr>
    </tbody>
  </table>
</div>