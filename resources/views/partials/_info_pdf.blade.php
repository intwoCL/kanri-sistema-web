<div class="card-body table-responsive">
  <table class="table table-bordered table-hover table-sm">
    <thead>
      <tbody>
        <tr>
          <td><strong>RUT: </strong></td>
          <td>{{ $company->run }}</td>
        </tr>
        <tr>
          <td><strong>Dueño: </strong></td>
          <td>{{ $company->name_owner }}</td>
        </tr>
        <tr>
          <td><strong>Dirección: </strong></td>
          <td>{{ $company->address }} - {{ $company->city->name }}</td>
        </tr>
        <tr>
          <td><strong>Región: </strong></td>
          <td>{{ $company->city->region->name }}</td>
        </tr>
        <tr>
          <td><strong>Ciudad: </strong></td>
          <td>Santiago - Chile</td>
        </tr>
        <tr>
          <td><strong>Teléfono: </strong></td>
          <td>+56 9 {{ $company->phone }}</td>
        </tr>
        <tr>
          <td><strong>Correo: </strong></td>
          <td>{{ $company->email }}</td>
        </tr>
        <tr>
          <td><strong>Sitio web: </strong></td>
          <td>{{ $company->web_site }}</td>
        </tr>
      </tbody>
    </thead>
  </table>
</div>