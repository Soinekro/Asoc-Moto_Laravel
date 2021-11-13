@extends('adminlte::page')
@section('title', 'Socios')

@section('content_header')
    <h1>Socios Inactivos</h1>
@stop

@section('content')

@if (session('info'))

<div class="alert alert-warning">
    {{ session('info') }}
</div>
@endif
    @livewire('admin.socios.socios-inactive', ['socios' => $socios])
@stop

@section('js')
@endsection
