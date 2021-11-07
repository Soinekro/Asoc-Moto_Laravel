@extends('adminlte::page')
@section('title', 'Socios')

@section('content_header')
    <h1>Socios</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-warning">
    {{ session('info') }}
</div>
@endif
    @livewire('admin.socios.socios-index', ['socios' => $socios])
@stop

@section('js')
@endsection
