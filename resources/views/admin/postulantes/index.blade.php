@extends('adminlte::page')
@section('title', 'Postulantes')

@section('content_header')
    <a href="{{ route('admin.postulantes.create') }}" class="btn btn-warning float-right">Registrar Postulante</a>
    <h1>Postulantes</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
    @livewire('admin.postulantes.postulantes-index')

@stop

@section('js')
@endsection
