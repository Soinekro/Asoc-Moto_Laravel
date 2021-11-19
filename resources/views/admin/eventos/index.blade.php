@extends('adminlte::page')
@section('title', 'eventos')

@section('content_header')
<a href="{{ route('admin.eventos.create') }}" class="btn btn-warning float-right">Registrar Evento</a>
    <h1>eventos</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
    @livewire('admin.eventos.eventos-index')
@stop

@section('js')
@endsection
