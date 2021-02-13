<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>
          @if (!empty($route))
            <a href="{{ $route }}" class="text-{{ $color }}"><i class="fas fa-chevron-circle-left"></i></a>
          @endif
          <i class="{{ !empty($icon) ? $icon : '' }}"></i> {!! $body !!}
        </h1>
      </div>
    </div>
  </div>
</section>