@extends('adminlte::page')
@section('title', 'Justificaciones')

@section('content_header')
<a href="{{ route('admin.justificaciones.create') }}" class="btn btn-warning float-right">Registrar Justificacion</a>
    <h1>Justificaciones</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
    @livewire('admin.justificaciones.justificaciones-index')
@stop

@section('js')
@endsection
