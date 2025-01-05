<div class="card-body table-responsive">
  <table class="table table-bordered table-hover table-sm">
    <thead>
    <tr class="text-center">
      <th>{{ trans('t.id') }}</th>
      <th>{{ trans('t.name') }}</th>
      <th></th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr class="text-center">
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>
          <a href="{{ route('category.edit',$category->id) }}" class="btn-btn-success btn-sm">
            <i class="fas fa-edit"></i>
          </a>
        </td>
        <td>
          <form method="POST" action="{{ route('category.destroy', $category->id) }}">
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