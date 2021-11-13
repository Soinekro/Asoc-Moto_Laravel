@extends('adminlte::page')
@section('title', 'Vehiculos')

@section('content_header')
<a href="{{ route('admin.vehiculos.create') }}" class="btn btn-warning float-right">Registrar Vehiculo</a>
    <h1>Vehiculos</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-warning">
    {{ session('info') }}
</div>
@endif
    @livewire('admin.vehiculos.vehiculos-index')
@stop

@section('js')
@endsection
