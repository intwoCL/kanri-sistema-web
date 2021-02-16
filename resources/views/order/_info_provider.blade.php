<div class="card-body p-0">
  <table class="table table-sm">
    <tbody>
      <tr>
        <td>Rut: </td>
        <td>{{ $provider->rut }}</td>
      </tr>
      <tr>
        <td>Proveedor: </td>
        <td>
          {{ $provider->presenter()->getFullName() }}
        </td>
      </tr>
      <tr>
        <td>Dirección: </td>
        <td>{{ $provider->address }}</td>
      </tr>
      <tr>
        <td>Correo: </td>
        <td>{{ $provider->email }}</td>
      </tr>
      <tr>
        <td>Teléfono: </td>
        <td> {{ $provider->phone }}</td>
      </tr>
    </tbody>
  </table>
</div>