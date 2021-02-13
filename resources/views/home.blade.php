@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('route', '')
  @slot('color', 'dark')
  @slot('body', "Bienvenido")
@endcomponent
@endsection
@push('javascript')

@endpush