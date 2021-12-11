@extends('adminlte::page')
@section('title', 'PAGOS')

@section('content_header')
    <h1>Lista de Pagos</h1>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
@stop

@section('content')
    @livewire('admin.pagos.pagos-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script>
        livewire.on('alert', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Boleta Creada, enviada y aceptada por SUNAT',
                showConfirmButton: false,
                timer: 1500
            })
        });
    </script>
@stop
