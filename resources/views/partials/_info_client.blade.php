<div class="card-body table-responsive">
  <table class="table table-bordered table-hover table-sm">
    <thead>
      <tbody>
        <tr>
          <td><strong>RUT: </strong></td>
          <td>{{ !empty($budget->client) ? $budget->client->rut : 'N/A' }}</td>
        </tr>
        <tr>
          <td><strong>Cliente: </strong></td>
          <td></td>
        </tr>
        <tr>
          <td><strong>Encargado: </strong></td>
          <td>
            {{ !empty($budget->client) ? $budget->client->presenter()->getFullName() : 'N/A' }}
          </td>
        </tr>
        <tr>
          <td><strong>Cond. pago: </strong></td>
          <td></td>
        </tr>
        <tr>
          <td><strong>Fecha: </strong></td>
          <td>{{ $budget->getDateIn()->getDate() }}</td>
        </tr>
      </tbody>
    </thead>
  </table>
</div>