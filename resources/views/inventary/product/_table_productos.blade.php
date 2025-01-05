<div class="card-body table-responsive">
  <table id="tableSelect" class="table table-bordered table-hover table-sm">
    <thead>
    <tr class="text-center">
      <th>Código</th>
      <th>Nombre</th>
      <th>Descripción</th>
      {{-- <th>Costo</th> --}}
      <th>Precio</th>
      <th>Categoría</th>
      {{-- <th>Tipo</th>
      <th>U.M.</th> --}}
      <th>Stock D.</th>
      <th>Stock C.</th>
      <th></th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      @foreach ($products as $prod)
      <tr class="text-center">
        <td>
          <a href="{{ route('product.show',$prod->id) }}">{{ $prod->code }}</a>
        </td>
        <td>{{ $prod->name }}</td>
        <td>{{ $prod->description }}</td>
        <td>$ {{ $prod->getImportPrice() }}</td>
        {{-- <td>$ {{ $prod->getCreditPrice() }}</td> --}}
        <td>{{ $prod->category->name }}</td>
        {{-- <td>{{ $prod->productType->name }}</td>
        <td>{{ $prod->units->name }}</td> --}}
        <td>{{ $prod->available_stock }}</td>
        <td>{{ $prod->critical_stock }}</td>
        <td><img src="{{ $prod->presenter()->getPhoto() }}" class='Responsive image img-thumbnail'  width='200px' height='200px' alt=""></td>
        <td>
          <a href="{{ route('product.edit',$prod->id) }}" class="btn-btn-success btn-sm">
            <i class="fas fa-edit"></i>
          </a>
        </td>
        <td>
          <form method="POST" action="{{ route('product.destroy', $prod->id) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>