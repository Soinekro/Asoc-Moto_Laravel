@extends('adminlte::page')
@section('title', 'Evaluaciones')

@section('content_header')
    <h1>Evaluaciones</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
    @livewire('admin.evaluaciones.evaluaciones-index')
@stop

@section('js')
@endsection
