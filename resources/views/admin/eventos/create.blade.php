@extends('adminlte::page')
@section('title', 'Eventos')

@section('content_header')
    <h1>Registrar Evento</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
    <form action="{{ route('admin.eventos.store') }}" method="POST">
        @csrf
        @include('admin.eventos.partials.evento')
        <button class="btn btn-primary float-right" type="submit">Registrar Evento</button>
    @stop

    @section('js')

    @endsection
