@extends('adminlte::page')
@section('title', 'Postulantes')

@section('content_header')
    <h1>Registrar Postulante</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
    <form action="{{ route('admin.postulantes.store') }}" method="POST">
        @csrf
        @include('admin.postulantes.partials.postulante')
        <button class="btn btn-primary float-right" type="submit">Registrar Postulante</button>
    @stop

    @section('js')

    @endsection
