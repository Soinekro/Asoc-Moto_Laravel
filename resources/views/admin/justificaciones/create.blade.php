@extends('adminlte::page')
@section('title', 'Justificaciones')

@section('content_header')
    <h1>Registrar Justificacion</h1>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
    <form action="{{ route('admin.justificaciones.store') }}" method="POST">
        @csrf
        @include('admin.justificaciones.partials.justificacion')
        <button class="btn btn-primary float-right" type="submit">Registrar Justificacion</button>
    @stop

    @section('js')


    @endsection
