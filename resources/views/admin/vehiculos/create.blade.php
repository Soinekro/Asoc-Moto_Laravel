@extends('adminlte::page')
@section('title', 'Vehiculos')

@section('content_header')
    <h1>Registrar vehiculo</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
    <form action="{{ route('admin.vehiculos.store') }}" method="POST">
        @csrf
        @include('admin.vehiculos.partials.vehiculo')
        <button class="btn btn-primary float-right" type="submit">Registrar Vechiculo</button>
    @stop

    @section('js')

    @endsection
