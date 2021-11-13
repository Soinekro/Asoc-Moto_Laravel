@extends('adminlte::page')
@section('title', 'Vehiculos')

@section('content_header')
    <h1>Vehiculo Placa: <strong>{{$vehiculo->placa}}</strong> del socio : <strong>{{$vehiculo->socio->user->name}}</strong></h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
       <form action="{{route('admin.vehiculos.update',$vehiculo)}}" method="POST" >
        @csrf
        @include('admin.vehiculos.partials.vehiculo')
        <button class="btn btn-success float-right" type="submit">Editar Vehiculo</button>
    </form>
@stop

@section('js')

@endsection
